<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public $fillable = [
        'game_id',
        'game_name',
        'name',
        'max_level',
        'asset',
    ];
}
