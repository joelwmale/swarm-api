<?php

namespace Swarm\Game;

use Illuminate\Database\Eloquent\Model;
use Swarm\Wizards\WizardInventoryItem;

class CraftMaterial extends Model
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
        return $this->morphMany(WizardInventoryItem::class, 'inventorable');
    }
}
