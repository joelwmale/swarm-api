<?php

namespace Swarm\Game;

use Illuminate\Database\Eloquent\Model;
use Swarm\Players\PlayerInventoryItem;

class GameCraftMaterial extends Model
{
    public $fillable = [
        'id',
        'raw_name',
        'name',
        'asset',
    ];

    /**
     * Get all craft materials in the system.
     *
     * @return HasMany
     */
    public function craftMaterials()
    {
        return $this->morphMany(PlayerInventoryItem::class, 'inventorable');
    }
}
