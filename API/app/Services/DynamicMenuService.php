<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class DynamicMenuService
{
    /**
     * Fetches hierarchical menu data from the 'categories' table.
     *
     * This function retrieves all active categories of a specific type ('competition' or 'activity').
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCategoriesForMenu(): Collection
    {
        return Category::with('children')
            ->whereIn('type', ['competition', 'activity'])
            ->where('status', 'active')
            ->orderBy('id')
            ->get();
    }
}
