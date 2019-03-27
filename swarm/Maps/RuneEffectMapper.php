<?php

namespace Swarm\Maps;

class RuneEffectMapper
{
    /**
     * Takes an effect id and the value for the effect
     * and returns a string for the effect with its value.
     *
     * @param int $effectId
     * @param int $value
     *
     * @return string
     */
    public static function getEffect(int $effectId, int $value): string
    {
        // @TODO currently returning "Unknown" for 0,0 (e.g prefix effect of [0,0])
        // should probably return nothing...

        // Get the map array
        $map = static::runeEffects($value);

        // Return the correct value
        return array_get($map, $effectId) ?: 'Unknown';
    }

    /**
     * Maps the rune effect with the value.
     *
     * @return array
     */
    public static function runeEffects($value): array
    {
        return [
            0  => '',
            1  => "HP: +{$value}",
            2  => "HP: {$value}%",
            3  => "ATK: +{$value}",
            4  => "ATK: {$value}%",
            5  => "DEF: {$value}",
            6  => "DEF: {$value}%",
            8  => "SPD: +{$value}",
            9  => "CRI Rate: {$value}%",
            10 => "CRI Dmg: {$value}%",
            11 => "Resistance: {$value}%",
            12 => "Accuracy: {$value}%",
        ];
    }
}
