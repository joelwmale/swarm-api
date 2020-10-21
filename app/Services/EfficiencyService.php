<?php

namespace App\Services;

use App\Mappers\RuneMainStatMapper;
use App\Mappers\RuneSubStatMapper;
use App\Models\PlayerRune;

class EfficiencyService
{
    const MAX_ROLLS = 4;

    private $effectMaxRollMap = [
        6 => [
            1 => 375,
            2 => 8,
            3 => 20,
            4 => 8,
            5 => 20,
            6 => 7,
            8 => 6,
            9 => 6,
            10 => 7,
            11 => 8,
            12 => 8
        ]
    ];


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
    public function determineRuneEfficiency(PlayerRune $rune)
    {
        // dd($rune->primary_effect, $rune->innate_effect, $rune->secondary_effects);

        $innateEffect = json_decode($rune->getRawOriginal('innate_effect'));
        $subEffects = json_decode($rune->getRawOriginal('secondary_effects'));

        $efficiencyMatrix = [];

        // loop through the innate
        foreach ($innateEffect as $effect) {
            $efficiencyMatrix[] = $effect->value / ($this->effectMaxRollMap[$rune->rank][$effect->effect_id] * self::MAX_ROLLS);
        }

        foreach ($subEffects as $effect) {
            $efficiencyMatrix[] = $effect->value / ($this->effectMaxRollMap[$rune->rank][$effect->effect_id] * self::MAX_ROLLS);
        }

        return round(((array_sum($efficiencyMatrix) + 1) / 2.8) * 100, 2);
    }
}
