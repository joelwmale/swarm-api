<?php

use Illuminate\Database\Seeder;
use Swarm\Game\GameRuneSet;

class GameRuneSetSeeder extends Seeder
{
    /**
     * Seed the rune sets table.
     *
     * @return void
     */
    public function run()
    {
        $runeSets = $this->getRuneSets();

        foreach ($runeSets as $runeSet) {
            GameRuneSet::create($runeSet);
        }
    }

    protected function getRuneSets(): array
    {
        return [
            [
                'id'             => 1,
                'name'           => 'Energy',
                'set_pieces'     => 2,
                'effect'         => 'HP',
                'effect_percent' => 15,
            ],
            [
                'id'             => 2,
                'name'           => 'Guard',
                'set_pieces'     => 2,
                'effect'         => 'Defence',
                'effect_percent' => 15,
            ],
            [
                'id'             => 3,
                'name'           => 'Swift',
                'set_pieces'     => 4,
                'effect'         => 'Attack Speed',
                'effect_percent' => 25,
            ],
            [
                'id'             => 4,
                'name'           => 'Blade',
                'set_pieces'     => 2,
                'effect'         => 'Critical Rate',
                'effect_percent' => 12,
            ],
            [
                'id'             => 5,
                'name'           => 'Rage',
                'set_pieces'     => 4,
                'effect'         => 'Critical Damage',
                'effect_percent' => 40,
            ],
            [
                'id'             => 6,
                'name'           => 'Focus',
                'set_pieces'     => 2,
                'effect'         => 'Accuracy',
                'effect_percent' => 20,
            ],
            [
                'id'             => 7,
                'name'           => 'Endure',
                'set_pieces'     => 2,
                'effect'         => 'Resistance',
                'effect_percent' => 20,
            ],
            [
                'id'             => 8,
                'name'           => 'Fatal',
                'set_pieces'     => 4,
                'effect'         => 'Attack Power',
                'effect_percent' => 35,
            ],
            [
                'id'             => 10,
                'name'           => 'Despair',
                'set_pieces'     => 4,
                'effect'         => 'Stun Rate',
                'effect_percent' => 25,
            ],
            [
                'id'             => 11,
                'name'           => 'Vampire',
                'set_pieces'     => 4,
                'effect'         => 'Life Drain',
                'effect_percent' => 35,
            ],
            [
                'id'             => 13,
                'name'           => 'Violent',
                'set_pieces'     => 4,
                'effect'         => 'Extra Turn',
                'effect_percent' => 22,
            ],
            [
                'id'             => 14,
                'name'           => 'Nemesis',
                'set_pieces'     => 2,
                'effect'         => 'Attack Gauge',
                'effect_percent' => 4, // 4 percent for every 7% hp lost
            ],
            [
                'id'             => 15,
                'name'           => 'Will',
                'set_pieces'     => 2,
                'effect'         => 'Immunity',
                'effect_percent' => 1, // +1 turn
            ],
            [
                'id'             => 16,
                'name'           => 'Shield',
                'set_pieces'     => 2,
                'effect'         => 'Ally Shield 3 turns',
                'effect_percent' => 15,
                'effect_special' => 'of HP',
            ],
            [
                'id'             => 17,
                'name'           => 'Revenge',
                'set_pieces'     => 2,
                'effect'         => 'Counterattack',
                'effect_percent' => 15,
            ],
            [
                'id'             => 18,
                'name'           => 'Destroy',
                'set_pieces'     => 2,
                'effect'         => 'Damage dealt will reduce up to 4% of the enemies max health',
                'effect_percent' => 30,
            ],
            [
                'id'             => 19,
                'name'           => 'Fight',
                'set_pieces'     => 2,
                'effect'         => 'Allies\' Attack',
                'effect_percent' => 8,
            ],
            [
                'id'             => 20,
                'name'           => 'Determination',
                'set_pieces'     => 2,
                'effect'         => 'Allies\' Defence',
                'effect_percent' => 8,
            ],
            [
                'id'             => 21,
                'name'           => 'Enhance',
                'set_pieces'     => 2,
                'effect'         => 'Allies\' Health',
                'effect_percent' => 8,
            ],
            [
                'id'             => 22,
                'name'           => 'Accuracy',
                'set_pieces'     => 2,
                'effect'         => 'Allies\' Accuracy',
                'effect_percent' => 10,
            ],
            [
                'id'             => 23,
                'name'           => 'Tolerance',
                'set_pieces'     => 2,
                'effect'         => 'Allies\' Resistance',
                'effect_percent' => 10,
            ],
            [
                'id' => 99,
                'name' => 'Immemorial',
                'set_pieces' => 0,
                'effect' => null,
                'effect_percent' => 0
            ]
        ];
    }
}
