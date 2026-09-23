<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\DynamicMenuService;
use App\Http\Resources\Api\V1\MenuResource;

class MenuController extends Controller
{
    public function index(DynamicMenuService $dynamicMenuService)
    {
        $allCategories = $dynamicMenuService->getCategoriesForMenu();
        
        $groupedCategories = $allCategories->groupBy('type');
        
        // Filter to only root categories and pass to the V1 Resource
        return response()->json([
            'competition' => MenuResource::collection(
                $groupedCategories->get('competition', collect())->filter(fn($item) => $item->parent_id === null)
            ),
            'activity' => MenuResource::collection(
                $groupedCategories->get('activity', collect())->filter(fn($item) => $item->parent_id === null)
            ),
        ]);
    }
}
