<?php

namespace Swarm\Maps;

class DungeonTeamMapper
{
    public static function getDungeonForTeam(int $type, int $subType): string
    {
        $map = static::dungeonMap();

        return array_get($map, "$type.$subType") ?: 'Unknown';
    }

    public static function getTypeSubTypeForDungeon(string $dungeon)
    {
        $dungeon = strtolower($dungeon); // strictly make sure its lowercase
        $map = static::dungeonMap();

        $flippedMap = collect($map)->flatMap(function($value, $key) {
            return collect($value)->flip()->map(function($value) use ($key) {
                return [$key, $value];
            });
        })->mapWithKeys(function ($item, $key) {
            // change keys to lower case
            return [strtolower($key) => $item];
        });

        // foreach ($array as $index => $arr) {
        //     $arr = collect($arr);
        //     if ($arr->search('Arena')) {
        //         dd($index, $arr->search('Arena'));
        //     }
        // }

        return collect($flippedMap)->get($dungeon);
    }

    /**
     * Dungeon id maps.
     */
    public static function dungeonMap()
    {
        return [
            // seems to be scenario dungeons
            1 => [
                2 => 'Garen Forest (Normal)', // only allows for 2 monsters
                4 => 'Scenario Dungeon',
            ],
            // Arena
            2 => [
                4 => 'Arena',
            ],
            // Cairos dungeons
            3 => [
                // @TODO need to confirm wind, light, and dark dungeon ids
                1 => 'Dark Dungeon', // confirmed (29/03)
                2 => 'Fire Dungeon', // confirmed fire (29/03)
                3 => 'Water Dungeon', // confirmed water (29/03)
                4 => 'Wind Dungeon', // confirmed wind (29/03)
                5 => 'Hall of Magic',
                6 => 'Hall of Light', // confirmed light (29/03)
                7 => 'Giant\'s Keep',
                8 => 'Dragon\'s Lair',
                // 9-13 could be secret dungeons
                14 => 'Necropolis',

                // missing dark dungeon
                // verify: water/light
            ],
            // Secret dungeon
            4 => [
                5 => 'Fire Imp Dungeon', // fire imp or all?
            ],
            // TOA
            5 => [
                5 => 'Trial of Ascension', // @TODO verify if normal and hard
            ],
            // Rift dungeon
            8 => [
                1001 => 'Ice Beast',
                2001 => 'Fire Beast',
                3001 => 'Wind Beast',
                4001 => 'Light Beast',
                5001 => 'Dark Beast',
            ],
        ];
    }
}
