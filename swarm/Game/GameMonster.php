<?php

namespace Swarm\Game;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

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
