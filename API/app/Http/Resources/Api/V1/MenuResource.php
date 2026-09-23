<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'type' => $this->type,
            'icon' => $this->icon,
            'route' => "/{$this->type}/{$this->slug}",
            // Handle recursive children cleanly
            'children' => $this->children && $this->children->isNotEmpty() 
                ? MenuResource::collection($this->children) 
                : [],
        ];
    }
}
