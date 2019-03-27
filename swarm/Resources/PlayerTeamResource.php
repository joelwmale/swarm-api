<?php

namespace Swarm\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Swarm\Maps\DungeonTeamMapper;

class PlayerTeamResource extends JsonResource
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
            'dungeon' => DungeonTeamMapper::getDungeonForTeam($this->type, $this->sub_type),
            'leader' => $this->leader->getResource(),
            'units' => $this->team_units,
        ];
    }
}
