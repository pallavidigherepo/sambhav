<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;

class EventFilterService
{
    /**
     * Apply common filters to a query (Competitions or Events)
     *
     * @param Builder $query
     * @param array $filters
     * @return Builder
     */
    public function applyFilters(Builder $query, array $filters): Builder
    {
        if (!empty($filters['scope'])) {
            $query->where('scope', $filters['scope']);
        }

        if (!empty($filters['grade'])) {
            // Find events where the student's grade falls between grade_min and grade_max
            $grade = (int) $filters['grade'];
            $query->where(function ($q) use ($grade) {
                $q->where(function ($sq) use ($grade) {
                    $sq->where('grade_min', '<=', $grade)
                       ->where('grade_max', '>=', $grade);
                })
                ->orWhere(function ($sq) use ($grade) {
                    // if limits are not set, assume open for all
                    $sq->whereNull('grade_min')
                       ->whereNull('grade_max');
                });
            });
        }

        if (!empty($filters['status'])) {
            // e.g. "open" means registration deadline is in the future
            if ($filters['status'] === 'open') {
                $query->where('registration_deadline', '>=', now())
                      ->orWhereNull('registration_deadline');
            }
        }

        if (!empty($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }

        return $query;
    }
}
