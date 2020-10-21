<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasResource;

class RuneSet extends Model
{
    use HasResource;

    protected $fillable = [
        'id',
        'name',
    ];
}
