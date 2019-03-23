<?php

namespace Swarm\Attributes;

use Swarm\Summoners\Summoner;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $fillable = [
        'id',
        'name',
    ];

    /**
     * Get the summoners that have this attribute.
     */
    public function summoners()
    {
        return $this->hasMany(Summoner::class);
    }
}