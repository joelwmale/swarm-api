<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PlayerInventoryItem;

class CraftMaterial extends Model
{
    public $fillable = [
        'id',
        'raw_name',
        'name',
        'asset',
    ];

    /**
     * Get all craft materials in the system.
     *
     * @return HasMany
     */
    public function craftMaterials()
    {
        return $this->morphMany(PlayerInventoryItem::class, 'inventorable');
    }
}
