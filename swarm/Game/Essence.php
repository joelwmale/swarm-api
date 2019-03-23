<?php

namespace Swarm\Game;

use Illuminate\Database\Eloquent\Model;
use Swarm\Wizards\WizardInventoryItem;

class Essence extends Model
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
