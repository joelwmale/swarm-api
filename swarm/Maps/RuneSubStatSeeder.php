<?php

namespace Swarm\Maps;

class RuneSubStatMapper
{
    /**
     * This will return the maximum value for an effect as a sub stat on a rune.
     *
     * @param int $effectId
     * @param int $rank
     *
     * @return int
     */
    public static function getMaxSubStatForEffectAndRank(int $effectId, int $rank): int
    {
        $map = static::subStatMap();

        return array_get($map, "$effectId.$rank") ?: 0;
    }

    /**
     * An array of the main stat values
     */
    public static function subStatMap()
    {
        return [
            // HP Flat
            1 => [
                1 => 300,
                2 => 525,
                3 => 825,
                4 => 1125,
                5 => 1500,
                6 => 1875,
            ],

            // HP%
            2 => [
                1 => 10,
                2 => 15,
                3 => 25,
                4 => 30,
                5 => 35,
                6 => 40,
            ],

            // Atk Flat
            3 => [
                1 => 20,
                2 => 25,
                3 => 40,
                4 => 50,
                5 => 75,
                6 => 100,
            ],

            // Atk %
            4 => [
                1 => 10,
                2 => 15,
                3 => 25,
                4 => 30,
                5 => 35,
                6 => 40,
            ],

            // Def Flat
            5 => [
                1 => 20,
                2 => 25,
                3 => 40,
                4 => 50,
                5 => 75,
                6 => 100,
            ],

            // Def %
            6 => [
                1 => 10,
                2 => 15,
                3 => 25,
                4 => 30,
                5 => 35,
                6 => 40,
            ],

            // Spd
            8 => [
                1 => 5,
                2 => 10,
                3 => 15,
                4 => 20,
                5 => 25,
                6 => 30,
            ],

            // Critical rate
            9 => [
                1 => 5,
                2 => 10,
                3 => 15,
                4 => 20,
                5 => 25,
                6 => 30,
            ],

            // Critical damage
            10 => [
                1 => 10,
                2 => 15,
                3 => 20,
                4 => 25,
                5 => 25,
                6 => 35,
            ],

            // Resistance
            11 => [
                1 => 10,
                2 => 15,
                3 => 20,
                4 => 25,
                5 => 35,
                6 => 40,
            ],

            // Accuracy
            12 => [
                1 => 10,
                2 => 15,
                3 => 20,
                4 => 25,
                5 => 35,
                6 => 40,
            ],
        ];
    }
}
