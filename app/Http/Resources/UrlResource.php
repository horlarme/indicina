<?php

namespace App\Http\Resources;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UrlResource extends JsonResource
{
    public function __construct(Url $resource)
    {
        parent::__construct($resource);

        $this->resource = $resource;
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $data = $this->resource->only(['hits', 'created_at']);
        $data['short'] = $this->resource->id;
        $data['long'] = $this->resource->url;
        return $data;
    }
}
