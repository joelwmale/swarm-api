<?php

use Illuminate\Database\Seeder;
use Swarm\Runes\RuneSubstat;

class RuneSubstateeder extends Seeder
{
    /**
     * Seed the rune substats table.
     *
     * @return void
     */
    public function run()
    {
        $runeSubstats = $this->getRuneSubstats();

        foreach ($runeSubstats as $runeSubStat) {
            RuneSubstat::create($runeSubStat);
        }
    }

    protected function getRuneSubstats(): array
    {
        return [
            // HP Flat
            ['effect_id' => 1, 'rank' => 1, 'max_value' => 300],
            ['effect_id' => 1, 'rank' => 2, 'max_value' => 525],
            ['effect_id' => 1, 'rank' => 3, 'max_value' => 825],
            ['effect_id' => 1, 'rank' => 4, 'max_value' => 1125],
            ['effect_id' => 1, 'rank' => 5, 'max_value' => 1500],
            ['effect_id' => 1, 'rank' => 6, 'max_value' => 1875],

            // HP%
            ['effect_id' => 2, 'rank' => 1, 'max_value' => 10],
            ['effect_id' => 2, 'rank' => 2, 'max_value' => 15],
            ['effect_id' => 2, 'rank' => 3, 'max_value' => 25],
            ['effect_id' => 2, 'rank' => 4, 'max_value' => 30],
            ['effect_id' => 2, 'rank' => 5, 'max_value' => 35],
            ['effect_id' => 2, 'rank' => 6, 'max_value' => 40],

            // Atk Flat
            ['effect_id' => 3, 'rank' => 1, 'max_value' => 20],
            ['effect_id' => 3, 'rank' => 2, 'max_value' => 25],
            ['effect_id' => 3, 'rank' => 3, 'max_value' => 40],
            ['effect_id' => 3, 'rank' => 4, 'max_value' => 50],
            ['effect_id' => 3, 'rank' => 5, 'max_value' => 75],
            ['effect_id' => 3, 'rank' => 6, 'max_value' => 100],

            // Atk %
            ['effect_id' => 4, 'rank' => 1, 'max_value' => 10],
            ['effect_id' => 4, 'rank' => 2, 'max_value' => 15],
            ['effect_id' => 4, 'rank' => 3, 'max_value' => 25],
            ['effect_id' => 4, 'rank' => 4, 'max_value' => 30],
            ['effect_id' => 4, 'rank' => 5, 'max_value' => 35],
            ['effect_id' => 4, 'rank' => 6, 'max_value' => 40],

            // Def Flat
            ['effect_id' => 5, 'rank' => 1, 'max_value' => 20],
            ['effect_id' => 5, 'rank' => 2, 'max_value' => 25],
            ['effect_id' => 5, 'rank' => 3, 'max_value' => 40],
            ['effect_id' => 5, 'rank' => 4, 'max_value' => 50],
            ['effect_id' => 5, 'rank' => 5, 'max_value' => 75],
            ['effect_id' => 5, 'rank' => 6, 'max_value' => 100],

            // Def %
            ['effect_id' => 6, 'rank' => 1, 'max_value' => 10],
            ['effect_id' => 6, 'rank' => 2, 'max_value' => 15],
            ['effect_id' => 6, 'rank' => 3, 'max_value' => 25],
            ['effect_id' => 6, 'rank' => 4, 'max_value' => 30],
            ['effect_id' => 6, 'rank' => 5, 'max_value' => 35],
            ['effect_id' => 6, 'rank' => 6, 'max_value' => 40],

            // Spd
            ['effect_id' => 8, 'rank' => 1, 'max_value' => 5],
            ['effect_id' => 8, 'rank' => 2, 'max_value' => 10],
            ['effect_id' => 8, 'rank' => 3, 'max_value' => 15],
            ['effect_id' => 8, 'rank' => 4, 'max_value' => 20],
            ['effect_id' => 8, 'rank' => 5, 'max_value' => 25],
            ['effect_id' => 8, 'rank' => 6, 'max_value' => 30],

            // Critical rate
            ['effect_id' => 9, 'rank' => 1, 'max_value' => 5],
            ['effect_id' => 9, 'rank' => 2, 'max_value' => 10],
            ['effect_id' => 9, 'rank' => 3, 'max_value' => 15],
            ['effect_id' => 9, 'rank' => 4, 'max_value' => 20],
            ['effect_id' => 9, 'rank' => 5, 'max_value' => 25],
            ['effect_id' => 9, 'rank' => 6, 'max_value' => 30],

            // Critical damage
            ['effect_id' => 10, 'rank' => 1, 'max_value' => 10],
            ['effect_id' => 10, 'rank' => 2, 'max_value' => 15],
            ['effect_id' => 10, 'rank' => 3, 'max_value' => 20],
            ['effect_id' => 10, 'rank' => 4, 'max_value' => 25],
            ['effect_id' => 10, 'rank' => 5, 'max_value' => 25],
            ['effect_id' => 10, 'rank' => 6, 'max_value' => 35],

            // Resistance
            ['effect_id' => 11, 'rank' => 1, 'max_value' => 10],
            ['effect_id' => 11, 'rank' => 2, 'max_value' => 15],
            ['effect_id' => 11, 'rank' => 3, 'max_value' => 20],
            ['effect_id' => 11, 'rank' => 4, 'max_value' => 25],
            ['effect_id' => 11, 'rank' => 5, 'max_value' => 35],
            ['effect_id' => 11, 'rank' => 6, 'max_value' => 40],

            // Accuracy
            ['effect_id' => 12, 'rank' => 1, 'max_value' => 10],
            ['effect_id' => 12, 'rank' => 2, 'max_value' => 15],
            ['effect_id' => 12, 'rank' => 3, 'max_value' => 20],
            ['effect_id' => 12, 'rank' => 4, 'max_value' => 25],
            ['effect_id' => 12, 'rank' => 5, 'max_value' => 35],
            ['effect_id' => 12, 'rank' => 6, 'max_value' => 40],
        ];
    }
}
