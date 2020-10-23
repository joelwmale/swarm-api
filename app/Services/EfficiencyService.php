<?php

namespace App\Services;

use App\Mappers\RuneMainStatMapper;
use App\Mappers\RuneSubStatMapper;
use App\Models\PlayerRune;

class EfficiencyService
{
    const MAX_ROLLS = 5;

    private $effectMaxRollMap = [
        6 => [
            1 => 375, // flat hp
            2 => 8, // hp %
            3 => 20, // flat attack
            4 => 8, // attack %
            5 => 20, // defence
            6 => 7, // defence %
            8 => 6, // speed
            9 => 6, // crit rate
            10 => 7, // crit damage
            11 => 8, // resistance
            12 => 8 // accuracy
        ]
    ];

    /**
     * formula is:
     *
     * (foreach sub stat - work out their max possible roll (base * 5) and then divide that by their current stat) / 2.8
     */
    public function __construct(RuneMainStatMapper $runeMainStatMapper, RuneSubStatMapper $runeSubStatMapper)
    {
        $this->runeMainStatMapper = $runeMainStatMapper;
        $this->runeSubStatMapper = $runeSubStatMapper;
    }

    /**
     * lapis (1)
     * rune_id: 25635637476
     * curr efficiency: 78.61%
     * max efficiency: 78.61%
     *
     * atk: 118
     * cri dmg: 5%
     * attack: 7%
     * spd: 12
     * cri rate: 10%
     * res: 6%
     *
     *
     * janssen (2)
     * rune_id: 33116522141
     * curr efficiency: 59.64%
     * max efficiency: 88.21%
     *
     * def: 11%
     * def: 14
     * cri dmg: 7%
     * hp: 8%
     * spd: 6
     *
     * hp%, atk%, resist%, accuracy% : max increment of 8% = 8% start * 4 (3, 6, 9, 12)
     * def%, crit damage% : max increment of 7%
     * speed, crit rate% : max increment of 6%
     * hp: 375
     * attack, def: 20
     */
    public function determineCurrentRuneEfficiency(PlayerRune $rune)
    {
        // $innateEffect = json_decode($rune->getRawOriginal('innate_effect'));
        $subEffects = json_decode($rune->getRawOriginal('secondary_effects'));

        $efficiencyMatrix = [];

        // @TODO how to bake in the innate?
        // loop through the innate
        // foreach ($innateEffect as $effect) {
        //     $efficiencyMatrix[] = $effect->value / ($this->effectMaxRollMap[$rune->rank][$effect->effect_id] * self::MAX_ROLLS);
        // }

        foreach ($subEffects as $effect) {
            $efficiencyMatrix[] = $effect->value / ($this->effectMaxRollMap[$rune->rank][$effect->effect_id] * self::MAX_ROLLS);
        }

        return round(((array_sum($efficiencyMatrix) + 1) / 2.8) * 100, 2);
    }
}
