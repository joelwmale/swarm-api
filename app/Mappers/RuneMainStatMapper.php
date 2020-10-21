<?php

namespace App\Mappers;

use Illuminate\Support\Arr;

class RuneMainStatMapper
{
    /**
     * This will return the maximum value for an effect as a main stat on a rune.
     *
     * @param int $effectId
     * @param int $rank
     *
     * @return int
     */
    public static function getMaxMainStatForEffectAndRank(int $effectId, int $rank): int
    {
        $map = static::mainStatMap();

        return Arr::get($map, "$effectId.$rank") ?: 0;
    }

    /**
     * An array of the main stat values
     */
    public static function mainStatMap()
    {
        return [
            // HP Flat
            1 => [
                1 => 804,
                2 => 1092,
                3 => 1380,
                4 => 1704,
                5 => 2088,
                6 => 2448,
            ],

            // HP%
            2 => [
                1 => 18,
                2 => 20,
                3 => 38,
                4 => 43,
                5 => 51,
                6 => 63,
            ],

            // Atk Flat
            3 => [
                1 => 54,
                2 => 74,
                3 => 93,
                4 => 113,
                5 => 135,
                6 => 160,
            ],

            // Atk%
            4 => [
                1 => 18,
                2 => 20,
                3 => 38,
                4 => 43,
                5 => 51,
                6 => 63,
            ],

            // Def Flat
            5 => [
                1 => 54,
                2 => 74,
                3 => 93,
                4 => 113,
                5 => 135,
                6 => 160,
            ],

            // Def%
            6 => [
                1 => 18,
                2 => 20,
                3 => 38,
                4 => 43,
                5 => 51,
                6 => 63,
            ],

            // Spd
            8 => [
                1 => 18,
                2 => 19,
                3 => 25,
                4 => 30,
                5 => 39,
                6 => 42,
            ],

            // Crit Rate
            9 => [
                1 => 18,
                2 => 20,
                3 => 37,
                4 => 41,
                5 => 47,
                6 => 58,
            ],

            // Crit damage
            10 => [
                1 => 20,
                2 => 37,
                3 => 43,
                4 => 58,
                5 => 65,
                6 => 80,
            ],

            // Resistance
            11 => [
                1 => 18,
                2 => 20,
                3 => 38,
                4 => 44,
                5 => 51,
                6 => 64,
            ],

            // Accuracy
            12 => [
                1 => 18,
                2 => 20,
                3 => 38,
                4 => 44,
                5 => 51,
                6 => 64,
            ]
        ];
    }
}
