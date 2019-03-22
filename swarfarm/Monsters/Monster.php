<?php

namespace Swarfarm\Monsters;

use Swarfarm\Attributes\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * The class this monster belongs to.
     */
    public function class(): BelongsTo
    {
        return $this->belongsTo(MonsterClass::class);
    }
}
