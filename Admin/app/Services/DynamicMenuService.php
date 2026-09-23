<?php
namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

use function PHPUnit\Framework\isEmpty;

class DynamicMenuService
{
    /**
     * Fetches hierarchical menu data from the 'categories' table.
     *
     * This function retrieves all active categories of a specific type ('competition' or 'activity').
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCategoriesForMenu()
    {
        return Category::with('children')
            ->whereIn('type', ['competition', 'activity'])
            ->where('status', 'active')
            ->orderBy('id')
            ->get();
    }
}