<?php

namespace App;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class WizardUnit extends Model
{
    public $fillable = [
        'id',
        'wizard_id',
        'unit_id',
        'monster_id',
        'class_id',
        'attribute_id',
        'level',
        'stats',
        'skills',
        'create_time',
    ];

    /**
     * Format the stats.
     */
    public function setStatsAttribute($value)
    {
        $this->attributes['stats'] = ! empty($value) ? json_encode($value) : null;
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
                'rank' => Arr::get($skill, 1),
            ]);
            }
        }

        $this->attributes['skills'] = ! empty($value) && is_array($value) ? json_encode($skills) : null;
    }
}
