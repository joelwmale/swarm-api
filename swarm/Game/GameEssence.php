<?php

namespace Swarm\Game;

use Illuminate\Database\Eloquent\Model;
use Swarm\Players\PlayerInventoryItem;

class GameEssence extends Model
{
    public $fillable = [
        'id',
        'raw_name',
        'name',
        'asset',
    ];

    /**
     * Get all essences in the db.
     *
     * @return HasMany
     */
    public function essences()
    {
        return $this->morphMany(PlayerInventoryItem::class, 'inventorable');
    }
}
