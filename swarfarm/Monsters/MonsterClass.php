<?php

namespace Swarfarm\Monster;

use Illuminate\Database\Eloquent\Model;

class MonsterClass extends Model
{
    public $fillable = [
        'id',
        'name',
    ];
}
