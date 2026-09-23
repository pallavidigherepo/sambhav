<?php

namespace App\Services\Scoring;

interface ScoreCalculatorInterface
{
    /**
     * Calculate the total score for a given user.
     *
     * @param int $userId
     * @return int
     */
    public function calculateScore(int $userId): int;
}
