<?php

namespace Swarm\Attributes;

use Illuminate\Database\Eloquent\Model;
use Swarm\Summoners\Summoner;

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
