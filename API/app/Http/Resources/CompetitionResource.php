<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;

class CompetitionResource extends JsonResource
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
            'code' => $this->code,
            'description' => $this->description,
            'image' => $this->image ? url('storage/' . $this->image) : null,
            'scope' => $this->scope,
            'grade_min' => $this->grade_min,
            'grade_max' => $this->grade_max,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'location' => $this->location,
            'registration_deadline' => $this->registration_deadline,
            'registration_fee' => $this->registration_fee,
            'apply_url' => $this->apply_url,
            'rules' => $this->rules,
            'prize' => $this->prize,
            'eligibility_criteria' => $this->eligibility_criteria,
            'judging_criteria' => $this->judging_criteria,
            'terms_and_conditions' => $this->terms_and_conditions,
            'organizer_name' => $this->organizer_name,
            'organizer_email' => $this->organizer_email,
            'organizer_phone' => $this->organizer_phone,
            'organizer_website' => $this->organizer_website,
            'status' => $this->status,
            'category_name' => $this->category ? $this->category->name : null,
            'city_name' => $this->city ? $this->city->name : null,
            'is_bookmarked' => $isBookmarked,
        ];
    }
}
