<?php

namespace Swarm\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GameMonsterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'attribute' => $this->attribute->name,
            'name'      => $this->name,
        ];
    }
}
