<?php

namespace Swarm\Game;

use Illuminate\Database\Eloquent\Model;

class GameBuilding extends Model
{
    public $fillable = [
        'id',
        'raw_name',
        'name',
        'asset',
    ];
}
