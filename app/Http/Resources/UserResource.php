<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'name' => $this->resource->name,
            'email' => $this->resource->email,
            'country' => $this->resource->country,
            'city' => $this->resource->city,
            'uuid' => $this->resource->uuid,
            'created_at' => $this->resource->created_at->diffForHumans(),
            'products' => ProductResource::collection($this->resource->products),
        ];
    }
}
