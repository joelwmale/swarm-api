<?php

namespace Swarm\Runes;

use Illuminate\Database\Eloquent\Model;

class RuneMainstat extends Model
{
    protected $fillable = [
        'effect_id',
        'rank',
        'max_value',
    ];
}
