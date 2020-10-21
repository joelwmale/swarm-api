<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasResource;

class PlayerTeam extends Model
{
    use SoftDeletes;
    use HasResource;

    public $fillable = [
        'player_id',
        'type',
        'sub_type',
        'leader_unit_id',
        'team_units',
    ];

    public function leader(): BelongsTo
    {
        return $this->belongsTo(PlayerUnit::class, 'leader_unit_id', 'unit_id');
    }

    /**
     * Format the team units.
     */
    public function getTeamUnitsAttribute($value)
    {
        $units = collect(json_decode($value, true));

        $units->transform(function ($monsterId, $pos) {
            $unit = PlayerUnit::whereUnitId($monsterId)->first();

            return [
                'position' => $pos,
                'unit'     => $unit ? $unit->getResource() : null,
            ];
        });

        return $units->toArray();
    }

    public function setTeamUnitsAttribute($value)
    {
        $this->attributes['team_units'] = !empty($value) ? json_encode($value) : null;
    }
}
