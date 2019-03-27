<?php

namespace Swarm\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Swarm\Game\GameRuneSet;
use Swarm\Maps\RuneEffectMapper;
use Swarm\Traits\HasResource;

class PlayerRune extends Model
{
    use SoftDeletes;
    use HasResource;

    protected $fillable = [
        'rune_id',
        'player_id',
        'set_id',

        'occupied',
        'player_unit_id',

        'slot',
        'quality',
        'rank',

        'current_level',
        'max_level',

        'base_value',
        'sell_value',

        'primary_effects',
        'prefix_effects',
        'secondary_effects',
    ];

    protected $casts = [
        'occupied' => 'boolean',
    ];

    /**
     * The set this rune belongs to.
     */
    public function set(): BelongsTo
    {
        return $this->belongsTo(GameRuneSet::class);
    }

    /**
     * The player this rune belongs to.
     */
    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    /**
     * The unit that owns this rune.
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(PlayerUnit::class, 'player_unit_id', 'unit_id');
    }

    public function getQualityAttribute($value)
    {
        $runeQualities = [
            '',
            'Common',
            'Magic',
            'Rare',
            'Hero',
            'Legend',
        ];

        return $runeQualities[$value];
    }

    public function getPrimaryEffectsAttribute($value)
    {
        $primaryEffects = collect();

        // Decode the effect
        $effects = collect(json_decode($value, true));

        $effects->each(function ($effect) use ($primaryEffects) {
            $effect = collect($effect);
            $primaryEffects->push(RuneEffectMapper::getEffect($effect->get('effect_id'), $effect->get('value')));
        });

        return $primaryEffects;
    }

    /**
     * Parse the primary effect attribute.
     *
     * @param mixed $value
     */
    public function setPrimaryEffectsAttribute($value)
    {
        $effects = [];

        // $value is an array of [0] = effect id, [1] = value
        if (is_array($value)) {
            array_push($effects, [
                'effect_id' => Arr::get($value, 0),
                'value'     => Arr::get($value, 1),
            ]);
        }

        $this->attributes['primary_effects'] = !empty($value) && is_array($value) ? json_encode($effects) : null;
    }

    public function getPrefixEffectsAttribute($value)
    {
        $prefixEffects = collect();

        // Decode the effect
        $effects = collect(json_decode($value, true));

        $effects->each(function ($effect) use ($prefixEffects) {
            $effect = collect($effect);
            $prefixEffects->push(RuneEffectMapper::getEffect($effect->get('effect_id'), $effect->get('value')));
        });

        return $prefixEffects;
    }

    /**
     * Parse the prefix effect attribute.
     *
     * @param mixed $value
     */
    public function setPrefixEffectsAttribute($value)
    {
        $effects = [];

        // $value is an array of [0] = effect id, [1] = value
        if (is_array($value)) {
            array_push($effects, [
                'effect_id' => Arr::get($value, 0),
                'value'     => Arr::get($value, 1),
            ]);
        }

        $this->attributes['prefix_effects'] = !empty($value) && is_array($value) ? json_encode($effects) : null;
    }

    public function getSecondaryEffectsAttribute($value)
    {
        $secondaryEffects = collect();

        // Decode the effect
        $effects = collect(json_decode($value, true));

        $effects->each(function ($effect) use ($secondaryEffects) {
            $effect = collect($effect);
            $secondaryEffects->push(RuneEffectMapper::getEffect($effect->get('effect_id'), $effect->get('value')));
        });

        return $secondaryEffects;
    }

    /**
     * Parse the prefix effect attribute.
     *
     * @param mixed $value
     */
    public function setSecondaryEffectsAttribute($value)
    {
        $effects = [];

        // @TODO this is incorrect

        // $value is an array of arrays
        if (is_array($value)) {
            foreach ($value as $effect) {
                // effect is an array of [0] = effect id, [1] = value
                array_push($effects, [
                    'effect_id' => Arr::get($effect, 0),
                    'value'     => Arr::get($effect, 1),
                    // 'substat_1' => Arr::get($effect, 2), // @TODO what are these substats?
                    // 'substat_2' => Arr::get($effect, 3),
                ]);
            }
        }

        $this->attributes['secondary_effects'] = !empty($value) && is_array($value) ? json_encode($effects) : null;
    }
}
