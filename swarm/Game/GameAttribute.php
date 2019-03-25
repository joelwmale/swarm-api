<?php

namespace Swarm\Game;

use Illuminate\Database\Eloquent\Model;

class GameAttribute extends Model
{
    public $fillable = [
        'game_id',
        'name',
    ];
}
