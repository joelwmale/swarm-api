<?php

namespace Swarm\Game;

use Illuminate\Database\Eloquent\Model;
use Swarm\Traits\HasResource;

class GameAttribute extends Model
{
    use HasResource;

    public $fillable = [
        'game_id',
        'name',
    ];
}
