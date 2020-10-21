<?php

namespace Swarm\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RuneSetResource extends JsonResource
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
            'name'   => $this->name,
            'effect' => 'TODO',
        ];
    }
}
