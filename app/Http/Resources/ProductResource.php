<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use JsonSerializable;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'user' => $this->resource->user->name,
            'name' => $this->resource->name,
            'price' => number_format($this->resource->price),
            'uuid' => $this->resource->uuid,
            'created_at' => $this->resource->created_at->diffForHumans(),
        ];
    }
}
