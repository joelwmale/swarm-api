<?php

namespace Swarm\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayerUnitResource extends JsonResource
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
            'monster' => $this->monster->getResource(),
            'rank' => $this->rank,
            'level' => $this->level,
            'runes' => PlayerRuneResource::collection($this->runes),
            'rune_sets_active' => $this->activeRuneSets,
            'stats' => $this->stats,
            'skills' => $this->skills,
            'summoned' => $this->summoned,
        ];
    }
}

// swift should be active only
