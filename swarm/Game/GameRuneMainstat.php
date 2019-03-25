<?php

namespace Swarm\Game;

use Illuminate\Database\Eloquent\Model;

class GameRuneMainstat extends Model
{
    protected $fillable = [
        'effect_id',
        'rank',
        'max_value',
    ];
}
