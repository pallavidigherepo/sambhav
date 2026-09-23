<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $isBookmarked = false;
        
        if (Auth::guard('sanctum')->check()) {
            $isBookmarked = Bookmark::where('user_id', Auth::guard('sanctum')->id())
                ->where('bookmarkable_id', $this->id)
                ->where('bookmarkable_type', get_class($this->resource))
                ->exists();
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'image' => $this->image ? url('storage/' . $this->image) : null,
            'scope' => $this->scope,
            'grade_min' => $this->grade_min,
            'grade_max' => $this->grade_max,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'apply_url' => $this->apply_url,
            'is_bookmarked' => $isBookmarked,
        ];
    }
}
