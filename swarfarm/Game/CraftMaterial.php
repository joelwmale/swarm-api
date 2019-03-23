<?php

namespace Swarfarm\Game;

use Illuminate\Database\Eloquent\Model;
use Swarfarm\Wizards\WizardInventoryItem;

class CraftMaterial extends Model
{
    public $fillable = [
        'id',
        'raw_name',
        'name',
        'asset',
    ];

    /**
     * Get all essences
     *
     * @return HasMany
     */
    public function essences()
    {
        return $this->morphMany(WizardInventoryItem::class, 'inventorable');
    }
}
