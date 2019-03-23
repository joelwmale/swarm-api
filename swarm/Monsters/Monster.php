<?php

namespace Swarm\Monsters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Swarm\Attributes\Attribute;

class Monster extends Model
{
    public $fillable = [
        'id',
        'name',
    ];

    /**
     * The attribute the monster belongs to.
     */
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }
}
