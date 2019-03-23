<?php

namespace Swarm\Wizards;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Swarm\Attributes\Attribute;
use Swarm\Monsters\Monster;

class WizardUnitPiece extends Model
{
    public $fillable = [
        'wizard_id',
        'monster_id',
        'attribute_id',
        'quantity',
    ];

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    public function monster(): BelongsTo
    {
        return $this->belongsTo(Monster::class);
    }

    public function wizard(): BelongsTo
    {
        return $this->belongsTo(Wizard::class);
    }
}
