<?php

namespace Swarm\Wizards;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Swarm\Users\User;

class Wizard extends Model
{
    use SoftDeletes;

    public $fillable = [
        'user_id',
        'wizard_id',
        'wizard_name',
        'wizard_level',
        'wizard_mana',
        'wizard_crystal',
        'energy_max',
        'energy_per_min',
        'rep_unit_id',
        'last_login',
    ];

    public function buildings(): HasMany
    {
        return $this->hasMany(WizardBuilding::class);
    }

    /**
     * The user this wizard belongs to.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function units(): HasMany
    {
        return $this->hasMany(WizardUnit::class);
    }

    public function unitPieces(): HasMany
    {
        return $this->hasMany(WizardUnitPiece::class);
    }

    public function inventoryItems(): HasMany
    {
        return $this->hasMany(WizardInventoryItem::class);
    }

    public function runes(): HasMany
    {
        return $this->hasMany(WizardRune::class);
    }
}
