<?php

namespace Swarm\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Swarm\Game\GameMonster;

class PlayerUnitPiece extends Model
{
    use SoftDeletes;

    public $fillable = [
        'player_id',
        'monster_id',
        'quantity',
    ];

    public function monster(): BelongsTo
    {
        return $this->belongsTo(GameMonster::class);
    }

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }
}
