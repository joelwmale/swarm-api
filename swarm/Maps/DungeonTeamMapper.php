<?php

namespace Swarm\Maps;

class DungeonTeamMapper
{
    public static function getDungeonForTeam(int $type, int $subType): string
    {
        $map = static::dungeonMap();

        return array_get($map, "$type.$subType");
    }

    /**
     * Dungeon id maps
     */
    public static function dungeonMap()
    {
        return [
            // seems to be scenario dungeons
            1 => [
                2 => 'Garen Forst (Normal)', // only allows for 2 monsters
                4 => 'Scenario Dungeon'
            ],
            // Arena
            2 => [
                4 => 'Arena'
            ],
            // Cairos dungeons
            3 => [
                1 => 'Water Dungeon',
                2 => 'Fire Dungeon', // confirmed fire (26/03)
                3 => 'Wind Dungeon',
                4 => 'Light Dungeon',
                5 => 'Hall of Magic', // what is dark dungeon?
                7 => 'Giant\'s Keep',
                8 => 'Dragon\'s Lair',
                // 9-13 could be secret dungeons
                14 => 'Necropolis',

                // missing dark dungeon
                // verify: water/wind/light
            ],
            // Secret dungeon
            4 => [
                5 => 'Fire Imp Dungeon' // fire imp or all?
            ],
            // TOA
            5 => [
                5 => 'Trial of Ascension' // @TODO verify if normal and hard
            ],
            // Rift dungeon
            8 => [
                1001 => 'Ice Beast',
                2001 => 'Fire Beast',
                3001 => 'Wind Beast',
                4001 => 'Light Beast',
                5001 => 'Dark Beast',
            ]
        ];
    }
}
