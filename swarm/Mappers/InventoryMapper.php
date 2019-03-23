<?php

namespace Swarm\Mappers;

class InventoryMapper
{
    /**
     * Returns the appropriate classes for the inventory item.
     */
    public static function getGameClassFor(int $itemMasterTypeId)
    {
        $map = static::classMap();

        return array_get($map, $itemMasterTypeId);
    }

    /**
     * Item inventory master type id to class map.
     */
    public static function classMap()
    {
        return [
            11 => \Swarm\Game\Essence::class,
            // 12 => monster piece handled by MonsterPieceImporter
            29 => \Swarm\Game\CraftMaterial::class,
        ];
    }
}

// 'monster': 1,
// 'currency': 6,
// 'rune': 8,
// 'scroll': 9,
// 'booster': 10,
// # '': 15, Unknown. Appears in inventory_info with qty 0
// 'guild_monster_piece': 19,
// 'rainbowmon': 25,   # Possibly material monsters in general. Appears when wish returns a rainbowmon.
// 'rune_craft': 27,
