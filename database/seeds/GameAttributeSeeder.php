<?php

use Illuminate\Database\Seeder;
use Swarm\Game\GameAttribute;

class GameAttributeSeeder extends Seeder
{
    /**
     * Seed the attributes table.
     *
     * @return void
     */
    public function run()
    {
        $attributes = $this->getAttributes();

        foreach ($attributes as $attribute) {
            GameAttribute::create($attribute);
        }
    }

    protected function getAttributes(): array
    {
        return [
            ['game_id' => 1, 'name' => 'Water'],
            ['game_id' => 2, 'name' => 'Fire'],
            ['game_id' => 3, 'name' => 'Wind'],
            ['game_id' => 4, 'name' => 'Light'],
            ['game_id' => 5, 'name' => 'Dark'],
            ['game_id' => 6, 'name' => ''],
        ];
    }
}
