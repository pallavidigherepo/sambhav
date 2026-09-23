<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Services\EventFilterService;
use App\Http\Resources\EventResource;

class EventController extends Controller
{
    protected $filterService;

    public function __construct(EventFilterService $filterService)
    {
        $this->filterService = $filterService;
    }

    public function index(Request $request)
    {
        $query = Event::query()->where('is_active', true);
        
        $query = $this->filterService->applyFilters($query, $request->all());
        
        $query->orderBy('created_at', 'desc');

        $events = $query->paginate(12);

        return EventResource::collection($events);
    }
}
