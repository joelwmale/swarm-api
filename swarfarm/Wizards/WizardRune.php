<?php

namespace Swarfarm\Wizards;

use Illuminate\Support\Arr;
use Swarfarm\Runes\RuneSet;
use Swarfarm\Game\GameClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WizardRune extends Model
{
    protected $fillable = [
        'rune_id',
        'wizard_id',
        'class_id',
        'set_id',

        'occupied',
        'wizard_unit_id',

        'slot',
        'rank',

        'upgrade_max',
        'upgrade_current',

        'base_value',
        'sell_value',

        'primary_effect',
        'prefix_effect',
        'secondary_effect',
    ];

    protected $casts = [
        'occupied' => 'boolean',
    ];

    /**
     * The class this rune belongs to.
     */
    public function class(): BelongsTo
    {
        return $this->belongsTo(GameClass::class);
    }

    public function set(): BelongsTo
    {
        return $this->belongsTo(RuneSet::class);
    }

    public function wizard(): BelongsTo
    {
        return $this->belongsTo(Wizard::class);
    }

    public function wizardUnit(): BelongsTo
    {
        return $this->belongsTo(WizardUnit::class);
    }

    /**
     * Parse the primary effect attribute.
     *
     * @param mixed $value
     */
    public function setPrimaryEffectAttribute($value)
    {
        $effects = [];

        // $value is an array of [0] = effect id, [1] = value
        if (is_array($value)) {
            array_push($effects, [
                'effect_id' => Arr::get($value, 0),
                'value' => Arr::get($value, 1),
            ]);
        }

        $this->attributes['primary_effect'] = ! empty($value) && is_array($value) ? json_encode($effects) : null;
    }

    /**
     * Parse the prefix effect attribute.
     *
     * @param mixed $value
     */
    public function setPrefixEffectAttribute($value)
    {
        $effects = [];

        // $value is an array of [0] = effect id, [1] = value
        if (is_array($value)) {
            array_push($effects, [
                'effect_id' => Arr::get($value, 0),
                'value' => Arr::get($value, 1),
            ]);
        }

        $this->attributes['prefix_effect'] = ! empty($value) && is_array($value) ? json_encode($effects) : null;
    }

    /**
     * Parse the prefix effect attribute.
     *
     * @param mixed $value
     */
    public function setSecondaryEffectAttribute($value)
    {
        $effects = [];

        // $value is an array of [0] = effect id, [1] = value
        if (is_array($value)) {
            array_push($effects, [
                'effect_id' => Arr::get($value, 0),
                'value' => Arr::get($value, 1),
                'substat_1' => Arr::get($value, 2),
                'substat_2' => Arr::get($value, 3),
            ]);
        }

        $this->attributes['secondary_effect'] = ! empty($value) && is_array($value) ? json_encode($effects) : null;
    }
}
