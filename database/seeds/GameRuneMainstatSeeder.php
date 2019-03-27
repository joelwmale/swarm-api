<?php

use Illuminate\Database\Seeder;
use Swarm\Game\GameRuneMainstat;

class GameRuneMainstatSeeder extends Seeder
{
    /**
     * Seed the rune mainstats table.
     *
     * @return void
     */
    public function run()
    {
        $runeMainstats = $this->getRuneMainstats();

        foreach ($runeMainstats as $runeMainstat) {
            GameRuneMainstat::create($runeMainstat);
        }
    }

    protected function getRuneMainstats(): array
    {
        /*
         * so if the effect id is 6, then the array is talking
         * about defence %,
         * in the main stat array, it means as a main stat
         * defence, at 6 stars, can have a maximum roll of 63%.
         */
        return [
            // HP Flat
            ['effect_id' => 1, 'rank' => 1, 'max_value' => 804],
            ['effect_id' => 1, 'rank' => 2, 'max_value' => 1092],
            ['effect_id' => 1, 'rank' => 3, 'max_value' => 1380],
            ['effect_id' => 1, 'rank' => 4, 'max_value' => 1704],
            ['effect_id' => 1, 'rank' => 5, 'max_value' => 2088],
            ['effect_id' => 1, 'rank' => 6, 'max_value' => 2448],

            // HP%
            ['effect_id' => 2, 'rank' => 1, 'max_value' => 18],
            ['effect_id' => 2, 'rank' => 2, 'max_value' => 20],
            ['effect_id' => 2, 'rank' => 3, 'max_value' => 38],
            ['effect_id' => 2, 'rank' => 4, 'max_value' => 43],
            ['effect_id' => 2, 'rank' => 5, 'max_value' => 51],
            ['effect_id' => 2, 'rank' => 6, 'max_value' => 63],

            // Atk Flat
            ['effect_id' => 3, 'rank' => 1, 'max_value' => 54],
            ['effect_id' => 3, 'rank' => 2, 'max_value' => 74],
            ['effect_id' => 3, 'rank' => 3, 'max_value' => 93],
            ['effect_id' => 3, 'rank' => 4, 'max_value' => 113],
            ['effect_id' => 3, 'rank' => 5, 'max_value' => 135],
            ['effect_id' => 3, 'rank' => 6, 'max_value' => 160],

            // Atk%
            ['effect_id' => 4, 'rank' => 1, 'max_value' => 18],
            ['effect_id' => 4, 'rank' => 2, 'max_value' => 20],
            ['effect_id' => 4, 'rank' => 3, 'max_value' => 38],
            ['effect_id' => 4, 'rank' => 4, 'max_value' => 43],
            ['effect_id' => 4, 'rank' => 5, 'max_value' => 51],
            ['effect_id' => 4, 'rank' => 6, 'max_value' => 63],

            // Def Flat
            ['effect_id' => 5, 'rank' => 1, 'max_value' => 54],
            ['effect_id' => 5, 'rank' => 2, 'max_value' => 74],
            ['effect_id' => 5, 'rank' => 3, 'max_value' => 93],
            ['effect_id' => 5, 'rank' => 4, 'max_value' => 113],
            ['effect_id' => 5, 'rank' => 5, 'max_value' => 135],
            ['effect_id' => 5, 'rank' => 6, 'max_value' => 160],

            // Def%
            ['effect_id' => 6, 'rank' => 1, 'max_value' => 18],
            ['effect_id' => 6, 'rank' => 2, 'max_value' => 20],
            ['effect_id' => 6, 'rank' => 3, 'max_value' => 38],
            ['effect_id' => 6, 'rank' => 4, 'max_value' => 43],
            ['effect_id' => 6, 'rank' => 5, 'max_value' => 51],
            ['effect_id' => 6, 'rank' => 6, 'max_value' => 63],

            // Spd
            ['effect_id' => 8, 'rank' => 1, 'max_value' => 18],
            ['effect_id' => 8, 'rank' => 2, 'max_value' => 19],
            ['effect_id' => 8, 'rank' => 3, 'max_value' => 25],
            ['effect_id' => 8, 'rank' => 4, 'max_value' => 30],
            ['effect_id' => 8, 'rank' => 5, 'max_value' => 39],
            ['effect_id' => 8, 'rank' => 6, 'max_value' => 42],

            // Crit Rate
            ['effect_id' => 9, 'rank' => 1, 'max_value' => 18],
            ['effect_id' => 9, 'rank' => 2, 'max_value' => 20],
            ['effect_id' => 9, 'rank' => 3, 'max_value' => 37],
            ['effect_id' => 9, 'rank' => 4, 'max_value' => 41],
            ['effect_id' => 9, 'rank' => 5, 'max_value' => 47],
            ['effect_id' => 9, 'rank' => 6, 'max_value' => 58],

            // Crit damage
            ['effect_id' => 10, 'rank' => 1, 'max_value' => 20],
            ['effect_id' => 10, 'rank' => 2, 'max_value' => 37],
            ['effect_id' => 10, 'rank' => 3, 'max_value' => 43],
            ['effect_id' => 10, 'rank' => 4, 'max_value' => 58],
            ['effect_id' => 10, 'rank' => 5, 'max_value' => 65],
            ['effect_id' => 10, 'rank' => 6, 'max_value' => 80],

            // Resistance
            ['effect_id' => 11, 'rank' => 1, 'max_value' => 18],
            ['effect_id' => 11, 'rank' => 2, 'max_value' => 20],
            ['effect_id' => 11, 'rank' => 3, 'max_value' => 38],
            ['effect_id' => 11, 'rank' => 4, 'max_value' => 44],
            ['effect_id' => 11, 'rank' => 5, 'max_value' => 51],
            ['effect_id' => 11, 'rank' => 6, 'max_value' => 64],

            // Accuracy
            ['effect_id' => 12, 'rank' => 1, 'max_value' => 18],
            ['effect_id' => 12, 'rank' => 2, 'max_value' => 20],
            ['effect_id' => 12, 'rank' => 3, 'max_value' => 38],
            ['effect_id' => 12, 'rank' => 4, 'max_value' => 44],
            ['effect_id' => 12, 'rank' => 5, 'max_value' => 51],
            ['effect_id' => 12, 'rank' => 6, 'max_value' => 64],
        ];
    }
}
