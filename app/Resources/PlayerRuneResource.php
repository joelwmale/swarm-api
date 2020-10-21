<?php

namespace Swarm\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayerRuneResource extends JsonResource
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
            'quality'           => $this->quality,
            'primary_effect'   => $this->primary_effect,
            'innate_effect'    => $this->innate_effect,
            'secondary_effects' => $this->secondary_effects,
            // Only merge occupied and occupied unit when we're requesting
            // the rune and not the teams
            $this->mergeWhen($request->path() !== 'api/me/teams', [
                'occupied'      => $this->occupied,
                'occupied_unit' => $this->unit,
            ]),
        ];
    }
}
