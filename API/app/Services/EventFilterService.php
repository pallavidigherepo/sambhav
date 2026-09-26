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
            $catId = (int) $filters['category_id'];
            $allIds = $this->getAllDescendantCategoryIds($catId);
            $query->whereIn('category_id', $allIds);
        } elseif (!empty($filters['category'])) {
            $cat = $filters['category'];
            $categoryModel = \App\Models\Category::where('id', $cat)->orWhere('slug', $cat)->first();
            if ($categoryModel) {
                $allIds = $this->getAllDescendantCategoryIds($categoryModel->id);
                $query->whereIn('category_id', $allIds);
            }
        }

        if (!empty($filters['fee'])) {
            if ($filters['fee'] === 'free') {
                $query->where(function ($q) {
                    $q->whereNull('registration_fee')
                      ->orWhere('registration_fee', 0);
                });
            } elseif ($filters['fee'] === 'paid') {
                $query->where('registration_fee', '>', 0);
            }
        }

        if (!empty($filters['search'])) {
            $search = trim($filters['search']);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        return $query;
    }

    /**
     * Get array containing category ID and all descendant category IDs recursively.
     *
     * @param int $categoryId
     * @return array
     */
    private function getAllDescendantCategoryIds(int $categoryId): array
    {
        $ids = [$categoryId];
        $children = \App\Models\Category::whereIn('parent_id', $ids)->pluck('id')->toArray();
        while (!empty($children)) {
            $ids = array_merge($ids, $children);
            $children = \App\Models\Category::whereIn('parent_id', $children)->pluck('id')->toArray();
        }
        return array_unique($ids);
    }
}
