<?php

namespace Swarm\Players;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Swarm\Players\Player;
use Swarm\Game\GameMonster;
use Swarm\Game\GameAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

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
