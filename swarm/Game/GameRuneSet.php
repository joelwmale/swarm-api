<?php

namespace Swarm\Game;

use Illuminate\Database\Eloquent\Model;
use Swarm\Traits\HasResource;

class GameRuneSet extends Model
{
    use HasResource;

    protected $fillable = [
        'id',
        'name',
    ];
}
