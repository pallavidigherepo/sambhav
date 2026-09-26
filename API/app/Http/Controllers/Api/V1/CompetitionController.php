<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Services\EventFilterService;
use App\Http\Resources\CompetitionResource;

class CompetitionController extends Controller
{
    protected $filterService;

    public function __construct(EventFilterService $filterService)
    {
        $this->filterService = $filterService;
    }

    public function index(Request $request)
    {
        $query = Competition::with(['category', 'city'])->where('status', 'active');
        
        $query = $this->filterService->applyFilters($query, $request->all());
        
        if ($request->filled('sortBy')) {
            if ($request->sortBy === 'deadline') {
                $query->orderBy('registration_deadline', 'asc');
            } elseif ($request->sortBy === 'fee_low') {
                $query->orderBy('registration_fee', 'asc');
            } else {
                $query->orderBy('created_at', 'desc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $competitions = $query->paginate(12);

        return CompetitionResource::collection($competitions);
    }

    public function show($identifier)
    {
        $competition = Competition::with(['category', 'city', 'event'])
            ->where('status', 'active')
            ->where(function ($q) use ($identifier) {
                $q->where('slug', $identifier);
                if (is_numeric($identifier)) {
                    $q->orWhere('id', $identifier);
                }
            })
            ->firstOrFail();

        return new CompetitionResource($competition);
    }
}
