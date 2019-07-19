<?php

namespace Swarm\Game;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class GameMonsterSkill extends Model
{
    public $fillable = [
        'id',
        'name',
        'description',
        'icon',
        'slot',
        'hits',
        'aoe',
        'passive',
        'max_level',
        'multiplier_formula',
        'multiplier_formula_raw',
        'skill_effect',
        'scaling_stats'
    ];

    protected $casts = [
        'aoe' => 'boolean',
        'passive' => 'boolean'
    ];

    /**
     * Mutate the level progress description from one big long string
     * to an array of strings for better database storage
     *
     * @param mixed $value
     */
    public function setLevelProgressDescription($value)
    {
        $levelProgress = [];

        // Comes through as a big string
        $explode = explode(PHP_EOL, $value);

        if (is_array($explode)) {
            foreach ($explode as $progress) {
                array_push($levelProgress, $progress);
            }
        }

        $this->attributes['level_progress_description'] = !empty($levelProgress) && is_array($levelProgress) ? json_encode($levelProgress) : null;
    }

    public function setSkillEffectAttribute($value)
    {
        $effects = [];

        // $value is an array of [0] = effect id, [1] = value
        if (is_array($value)) {
            array_push($effects, [
                'effect_id' => Arr::get($value, 0),
                'value'     => Arr::get($value, 1),
            ]);
        }

        $this->attributes['skill_effect'] = !empty($value) && is_array($value) ? json_encode($effects) : null;
    }

    public function setScalingStatsAttribute($value)
    {
        $scales = [];

        // $value is an array of [0] = effect id, [1] = value
        if (is_array($value)) {
            array_push($scales, [
                'effect_id' => Arr::get($value, 0),
                'value'     => Arr::get($value, 1),
            ]);
        }

        $this->attributes['scaling_stats'] = !empty($value) && is_array($value) ? json_encode($scales) : null;
    }
}
