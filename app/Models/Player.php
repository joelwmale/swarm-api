<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Player extends Model
{
    use SoftDeletes;

    public $fillable = [
        'user_id',
        'player_id',
        'player_name',
        'player_level',
        'player_mana',
        'player_crystal',
        'energy_max',
        'energy_per_min',
        'rep_unit_id',
        'last_login',
    ];

    public function buildings(): HasMany
    {
        return $this->hasMany(PlayerBuilding::class);
    }

    /**
     * The user this player belongs to.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function units(): HasMany
    {
        return $this->hasMany(PlayerUnit::class);
    }

    public function unitPieces(): HasMany
    {
        return $this->hasMany(PlayerUnitPiece::class);
    }

    public function inventoryItems(): HasMany
    {
        return $this->hasMany(PlayerInventoryItem::class);
    }

    public function runes(): HasMany
    {
        return $this->hasMany(PlayerRune::class);
    }

    public function teams(): HasMany
    {
        return $this->hasMany(PlayerTeam::class);
    }
}
