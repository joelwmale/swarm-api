<?php

namespace Swarm\Wizards;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Swarm\Game\Building;

class WizardBuilding extends Model
{
    public $fillable = [
        'id',
        'wizard_id',
        'deco_id',
        'building_id',
        'level'
    ];

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }
}
