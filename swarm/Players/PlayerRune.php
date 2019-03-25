<?php

namespace Swarm\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Swarm\Game\GameRuneSet;

class PlayerRune extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rune_id',
        'player_id',
        'set_id',

        'class',
        'occupied',
        'player_unit_id',

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
        return $this->belongsTo(PlayerUnit::class, 'unit_id', 'player_unit_id');
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
                'value'     => Arr::get($value, 1),
            ]);
        }

        $this->attributes['primary_effect'] = !empty($value) && is_array($value) ? json_encode($effects) : null;
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
                'value'     => Arr::get($value, 1),
            ]);
        }

        $this->attributes['prefix_effect'] = !empty($value) && is_array($value) ? json_encode($effects) : null;
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
                'value'     => Arr::get($value, 1),
                'substat_1' => Arr::get($value, 2),
                'substat_2' => Arr::get($value, 3),
            ]);
        }

        $this->attributes['secondary_effect'] = !empty($value) && is_array($value) ? json_encode($effects) : null;
    }
}
