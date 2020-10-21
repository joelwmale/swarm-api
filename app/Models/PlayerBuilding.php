<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayerBuilding extends Model
{
    use SoftDeletes;

    public $fillable = [
        'id',
        'player_id',
        'deco_id',
        'building_id',
        'level',
    ];

    public function building(): BelongsTo
    {
        return $this->belongsTo(self::class);
    }

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }
}
