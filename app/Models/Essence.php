<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PlayerInventoryItem;

class Essence extends Model
{
    public $fillable = [
        'id',
        'raw_name',
        'name',
        'asset',
    ];

    /**
     * Get all essences in the db.
     *
     * @return HasMany
     */
    public function essences()
    {
        return $this->morphMany(PlayerInventoryItem::class, 'inventorable');
    }
}
