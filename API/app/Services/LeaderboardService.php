<?php

namespace App\Services;

use App\Models\User;
use App\Services\Scoring\ScoreCalculatorInterface;
use Illuminate\Support\Facades\Cache;

class LeaderboardService
{
    protected ScoreCalculatorInterface $scoreCalculator;

    public function __construct(ScoreCalculatorInterface $scoreCalculator)
    {
        $this->scoreCalculator = $scoreCalculator;
    }

    /**
     * Retrieve the global leaderboard.
     * Caches the results for 10 minutes to handle high traffic efficiently.
     *
     * @param int $limit
     * @return \Illuminate\Support\Collection
     */
    public function getGlobalLeaderboard(int $limit = 10)
    {
        return Cache::remember("leaderboard_global_{$limit}", 600, function () use ($limit) {
            // Note: In a production scenario with millions of users, this should be pre-calculated
            // via a CRON job or database triggers into a specific 'leaderboard' table.
            // For now, we dynamically fetch users and their total points.
            
            $users = User::with('studentProfile')->get();
            
            $rankedUsers = $users->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'school' => $user->studentProfile?->school_name ?? 'Unknown',
                    'points' => $this->scoreCalculator->calculateScore($user->id),
                ];
            })
            ->sortByDesc('points')
            ->take($limit)
            ->values();

            return $rankedUsers;
        });
    }
}
