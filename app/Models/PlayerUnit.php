<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use App\Models\Monster;
use App\Models\RuneSet;
use App\Traits\HasResource;
use App\Models\MonsterSkill;
use App\Mappers\RuneEffectMapper;

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
        return $this->belongsTo(Monster::class);
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
            $rune = RuneSet::whereName(ucfirst($name))->first();

            if ($count >= $rune->set_pieces) {
                // This effect is active
                $activeEffects->push($name);
            }
        });

        // Return the active effects
        return $activeEffects->toArray();
    }

    /**
     * Takes the units base stats and applies the rune stats
     *
     * @return array
     */
    public function getCalculatedStatsAttribute(): array
    {
        // Start with the base stats
        $calculatedStats = $this->stats;
        // Units runes
        $runes = $this->runes;

        // Loop through each rune
        $runes->each(function ($rune) use ($calculatedStats) {
            // Calculate the primary effects
            $rune->primary_effects->each(function ($pe) use ($calculatedStats) {
                $stat = RuneEffectMapper::getStatForEffect($pe->effect_id);

                if (isset($calculatedStats[$stat])) {
                    $calculatedStats[$stat] += $pe->value;
                }
            });

            // Calculate the secondary effects
            $rune->secondary_effects->each(function ($se) use ($calculatedStats) {
                $stat = RuneEffectMapper::getStatForEffect($se->effect_id);

                if (isset($calculatedStats[$stat])) {
                    $calculatedStats[$stat] += $se->value;
                }
            });
        });

        // Return an array of calculated stats
        return $calculatedStats;
    }

    /**
     * Format the stats.
     */
    public function getStatsAttribute($value)
    {
        // Decode the stats and return it
        return !empty($value) ? json_decode($value, true) : null;
    }

    public function setStatsAttribute($value)
    {
        // Create an empty stats array
        $stats = collect();

        if (!empty($value)) {
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
        // Make a custom array
        $skills = [];
        $monsterDamageService = resolve('\Swarmfarm\Services\MonsterDamageService');

        $rawSkills = json_decode($value, true);
        $unitStats = $this->calculatedStats;

        foreach ($rawSkills as $skill) {
            $skill = MonsterSkill::find($skill['skill_id']);

            if (!$skill) {
                // @TODO couldnt find this skill
                continue;
            }

            array_push($skills, [
                'skill' => $skill->toArray(),
                'estimated_damage' => $monsterDamageService->substituteStats($unitStats, $skill->multiplier_formula),
            ]);
        }

        // Return the skills or null
        return !empty($skills) ? $skills : null;
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
