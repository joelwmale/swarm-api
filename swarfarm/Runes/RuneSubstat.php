<?php

namespace Swarfarm\Runes;

use Illuminate\Database\Eloquent\Model;

class RuneSubstat extends Model
{
    protected $fillable = [
        'effect_id',
        'rank',
        'max_value',
    ];
}
