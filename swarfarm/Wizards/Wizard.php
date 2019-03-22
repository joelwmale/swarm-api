<?php

namespace Swarfarm\Wizards;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Swarfarm\Users\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\WizardUnit;

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

    /**
     * The user this wizard belongs to
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
}
