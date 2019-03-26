<?php

namespace Swarm\Game;

use Illuminate\Database\Eloquent\Model;

class GameBuilding extends Model
{
    public $fillable = [
        'game_id',
        'game_name',
        'name',
        'max_level',
        'asset',
    ];
}
