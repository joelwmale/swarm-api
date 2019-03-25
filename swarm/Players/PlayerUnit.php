<?php

namespace Swarm\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

class PlayerUnit extends Model
{
    use SoftDeletes;

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

    /**
     * Format the stats.
     */
    public function setStatsAttribute($value)
    {
        $this->attributes['stats'] = !empty($value) ? json_encode($value) : null;
    }

    /**
     * Format the skills.
     */
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
