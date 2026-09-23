<?php

namespace App\Services\Scoring;

use App\Models\Achievement;

class DefaultScoreCalculator implements ScoreCalculatorInterface
{
    /**
     * Calculate the total score based on sum of all approved achievements.
     *
     * @param int $userId
     * @return int
     */
    public function calculateScore(int $userId): int
    {
        return (int) Achievement::where('user_id', $userId)
            ->where('status', 'approved')
            ->sum('points_awarded');
    }
}
