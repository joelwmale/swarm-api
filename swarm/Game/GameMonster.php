<?php

namespace Swarm\Game;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Swarm\Traits\HasResource;
use Illuminate\Support\Str;

class GameMonster extends Model
{
    use HasResource;

    public $fillable = [
        'id',
        'attribute_id',
        'name',
        'icon',
        'skillups',
        'awaken_material'
    ];

    /**
     * The attribute the monster belongs to.
     */
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(GameAttribute::class);
    }

       /**
     * Parse the primary effect attribute.
     *
     * @param mixed $value
     */
    public function setAwakenMaterialAttribute($value)
    {
        $materials = collect();

        if (is_array($value)) {
            foreach ($value as $key => $val) {
                if (Str::contains($key, 'awaken_mats_') && $val > 0) {
                    // Get the essence
                    $essenceName = str_replace('awaken_mats_', '', $key);
                    $essence = GameEssence::where('game_name', 'essence_' . $essenceName)->first();

                    $materials->put($essence->id, $val);
                }
            }
        }

        $this->attributes['awaken_material'] = $materials->isNotEmpty() ? json_encode($materials->toArray()) : null;
    }
}
