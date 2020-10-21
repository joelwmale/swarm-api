<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasResource;

class Attribute extends Model
{
    use HasResource;

    public $fillable = [
        'game_id',
        'name',
    ];
}
