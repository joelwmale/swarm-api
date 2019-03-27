<?php

namespace Swarm\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Swarm\Traits\HasResource;
use Swarm\Game\GameMonster;
use Swarm\Game\GameRuneEffect;
use Swarm\Game\GameRuneSet;

class PlayerUnit extends Model
{
    use SoftDeletes;
    use HasResource;

    public $fillable = [
        'player_id',
        'unit_id',
        'monster_id',
        'rank',
        'level',
        'stats',
        'skills',
        'create_time',
    ];

    public function runes(): HasMany
    {
        return $this->hasMany(PlayerRune::class, 'player_unit_id', 'unit_id');
    }

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function monster(): BelongsTo
    {
        return $this->belongsTo(GameMonster::class);
    }

    // Get the rune effects that are active
    public function getActiveRuneSetsAttribute(): array
    {
        // Active effects starts blank
        $activeEffects = collect();

        // Runes equipped
        $runesEquipped = collect();

        foreach ($this->runes as $rune) {
            // Get the rune set
            $set = $rune->set;
            // Push the runes name to the runes equipped array
            $runesEquipped->push(strtolower($set->name));
        }

        // Returns the amount of occurences of each rune name
        $runeEquippedCount = $runesEquipped->countBy();

        $runeEquippedCount->each(function ($count, $name) use ($activeEffects) {
            // Get the rune
            $rune = GameRuneSet::whereName(ucfirst($name))->first();

            if ($count >= $rune->set_pieces) {
                // This effect is active
                $activeEffects->push($name);
            }
        });

        // Return the active effects
        return $activeEffects->toArray();
    }

    /**
     * Format the stats.
     */
    public function getStatsAttribute($value)
    {
        // Decode the stats and return it
        return ! empty($value) ? json_decode($value, true) : null;
    }

    public function setStatsAttribute($value)
    {
        // Create an empty stats array
        $stats = collect();

        if (! empty($value)) {
            foreach ($value as $stat => $v) {
                // Rename con to health
                if ($stat === 'con') {
                    $stat = 'health';
                }

                // Put the stat and the value into the array
                $stats->put($stat, $v);
            }
        }

        // Set the stats attribute
        $this->attributes['stats'] = $stats->isNotEmpty() ? json_encode($stats->toArray()) : null;
    }

    /**
     * Format the skills.
     */
    public function getSkillsAttribute($value)
    {
        // Decode the stats and return it
        return ! empty($value) ? json_decode($value, true) : null;
    }

    public function setSkillsAttribute($value)
    {
        $skills = [];

        // $value is an array of [0] = skill id, [1] = rank
        if (is_array($value)) {
            foreach ($value as $skill) {
                array_push($skills, [
                'skill_id' => Arr::get($skill, 0),
                'rank'     => Arr::get($skill, 1),
            ]);
            }
        }

        $this->attributes['skills'] = !empty($value) && is_array($value) ? json_encode($skills) : null;
    }
}
