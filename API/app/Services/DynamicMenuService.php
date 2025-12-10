<?php
namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

use function PHPUnit\Framework\isEmpty;

class DynamicMenuService
{
    /**
     * Fetches and structures hierarchical menu data from the 'categories' table.
     *
     * This function retrieves all active categories of a specific type ('competition' or 'activity')
     * and recursively organizes them based on the 'parent_id' column for frontend consumption.
     *
     * @return array The nested menu array suitable for a Vue component.
     */
    public function generate_dynamic_menu(): array
    {
        // 1. Fetch ALL active categories of both types and eager load children
        $allCategories = Category::with('children')
            ->whereIn('type', ['competition', 'activity'])
            ->where('status', 'active')
            ->orderBy('id')
            ->get();

        // 2. Separate categories by type
        $groupedCategories = $allCategories->groupBy('type');
        
        $unifiedMenu = [];

        // 3. Process each group (Competition and Activity)
        foreach (['competition', 'activity'] as $type) {
            if (isset($groupedCategories[$type])) {
                
                // Filter down to only the root categories for the current type
                $rootCategories = $groupedCategories[$type]->filter(fn($item) => $item->parent_id === null);

                // Build the nested structure for this type
                $unifiedMenu[$type] = $this->build_nested_menu_recursive($rootCategories);
            } else {
                $unifiedMenu[$type] = [];
            }
        }
        return $unifiedMenu;
    }

    /**
     * Recursive helper function to build the nested menu array.
     * Note: This is a local helper and should not be used directly outside the primary function.
     *
     * @param Collection $categories The collection of categories (either root or children).
     * @return array The nested array structure.
     */
    
    function build_nested_menu_recursive(Collection $categories): array
    {
        $menu = [];

        foreach ($categories as $category) {
            
            $item = [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
                'type' => $category->type,
                'icon' => $category->icon,
                // Generate a route based on type/slug for the frontend router
                'route' => "/{$category->type}/{$category->slug}", 
            ];

            // Recursively process children
            if ($category->children->isNotEmpty()) {
                $item['children'] = $this->build_nested_menu_recursive($category->children);
            } else {
                $item['children'] = [];
            }

            $menu[] = $item;
        }

        return $menu;
    }
}