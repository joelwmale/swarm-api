<?php

namespace Swarm\Wizards;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Swarm\Game\Essence;

class WizardInventoryItem extends Model
{
    public $fillable = [
        'wizard_id',
        'inventorable_id',
        'inventorable_type',
        'quantity',
    ];

    /**
     * The relationship this inventory item belongs to.
     *
     * @return MorphTo
     */
    public function inventorable(): MorphTo
    {
        return $this->morphTo()->withTrashed();
    }

    public function wizard(): BelongsTo
    {
        return $this->belongsTo(Wizard::class);
    }

    public function essences(): BelongsTo
    {
        return $this->belongsTo(Essence::class);
    }
}
