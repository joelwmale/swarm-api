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
     * Takes an effect id and returns the unit stat name for that effect.
     *
     * @param int $effectId
     *
     * @return string
     */
    public static function getStatForEffect(int $effectId): string
    {
        // @TODO currently returning "Unknown" for 0,0 (e.g prefix effect of [0,0])
        // should probably return nothing...

        // Get the map array
        $map = static::statEffects();

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

    /**
     * Maps the rune effect with the value.
     *
     * @return array
     */
    public static function statEffects(): array
    {
        return [
            0  => '',
            1  => 'health',
            // 2  => "HP: {$value}%",
            3  => 'attack',
            // 4  => "ATK: {$value}%",
            5  => 'defence',
            // 6  => "DEF: {$value}%",
            8  => 'speed',
            9  => 'critical_rate',
            10 => 'critical_damage',
            11 => 'resist',
            // 12 => "Accuracy: {$value}%",
        ];
    }
}
