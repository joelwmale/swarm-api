<?php

namespace Swarm\Game;

use Illuminate\Database\Eloquent\Model;

class GameClass extends Model
{
    public $fillable = [
        'id',
        'name',
    ];
}
