<?php

namespace Swarm\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Swarm\Game\Essence;

class PlayerInventoryItem extends Model
{
    use SoftDeletes;

    public $fillable = [
        'player_id',
        'inventorable_id',
        'inventorable_type',
        'quantity',
    ];

    /**
     * The relationship this inventory item belongs to.
     *
     * @return MorphTo
     */
    public function inventorable(): MorphTo
    {
        return $this->morphTo()->withTrashed();
    }

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function essences(): BelongsTo
    {
        return $this->belongsTo(Essence::class);
    }
}
