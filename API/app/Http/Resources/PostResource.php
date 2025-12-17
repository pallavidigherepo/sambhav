<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content, // The TipTap HTML
            'image_url' => $this->thumbnail ? asset('storage/' . $this->thumbnail) : null,
            'creator' => $this->creator->name,
            'updator' => $this->updator->name,
            'created_at' => $this->created_at->diffForHumans(),
            // The URL we generated in Filament for the frontend
            'public_url' => config('app.frontend_url') . "/blog/" . $this->slug,
        ];
    }
}
