<?php

namespace Swarm\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayerTeam extends Model
{
    use SoftDeletes;

    public $fillable = [
        'player_id',
        'type',
        'sub_type',
        'leader_unit_id',
        'team_units',
    ];

    /**
     * Format the team units.
     */
    public function setTeamUnitsAttribute($value)
    {
        $this->attributes['team_units'] = !empty($value) ? json_encode($value) : null;
    }
}
