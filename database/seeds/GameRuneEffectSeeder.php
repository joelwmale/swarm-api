<?php

use Illuminate\Database\Seeder;
use Swarm\Game\GameRuneEffect;

class GameRuneEffectSeeder extends Seeder
{
    /**
     * Seed the rune effects table.
     *
     * @return void
     */
    public function run()
    {
        $runeEffects = $this->getRuneEffects();

        foreach ($runeEffects as $runeEffect) {
            GameRuneEffect::create($runeEffect);
        }
    }

    protected function getRuneEffects(): array
    {
        return [
            ['id' => 0, 'name' => ''],
            ['id' => 1, 'name' => 'HP flat'],
            ['id' => 2, 'name' => 'HP%'],
            ['id' => 3, 'name' => 'ATK flat'],
            ['id' => 4, 'name' => 'ATK%'],
            ['id' => 5, 'name' => 'DEF flat'],
            ['id' => 6, 'name' => 'DEF%'],
            ['id' => 8, 'name' => 'SPD'],
            ['id' => 9, 'name' => 'CRate'],
            ['id' => 10, 'name' => 'CDmg'],
            ['id' => 11, 'name' => 'RES'],
            ['id' => 12, 'name' => 'ACC'],
        ];
    }
}
