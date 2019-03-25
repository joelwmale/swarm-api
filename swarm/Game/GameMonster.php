<?php

namespace Swarm\Game;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GameMonster extends Model
{
    public $fillable = [
        'game_id',
        'name',
    ];

    /**
     * The attribute the monster belongs to.
     */
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(GameAttribute::class);
    }
}
