<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LeaderboardService;

class LeaderboardController extends Controller
{
    protected $leaderboardService;

    public function __construct(LeaderboardService $leaderboardService)
    {
        $this->leaderboardService = $leaderboardService;
    }

    public function index(Request $request)
    {
        $limit = $request->get('limit', 10);
        $leaderboard = $this->leaderboardService->getGlobalLeaderboard($limit);

        return response()->json($leaderboard);
    }
}
