<?php

namespace Swarm\Game;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Swarm\Traits\HasResource;

class GameMonster extends Model
{
    use HasResource;

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
