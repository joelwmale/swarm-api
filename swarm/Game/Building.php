<?php

namespace Swarm\Game;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public $fillable = [
        'id',
        'raw_name',
        'name',
        'asset',
    ];
}
