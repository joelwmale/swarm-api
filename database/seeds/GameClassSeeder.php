<?php

use Swarm\Game\GameClass;
use Illuminate\Database\Seeder;

class GameClassSeeder extends Seeder
{
    /**
     * Seed the monster classes table.
     *
     * @return void
     */
    public function run()
    {
        $classes = $this->getClasses();

        foreach ($classes as $class) {
            GameClass::create($class);
        }
    }

    protected function getClasses(): array
    {
        return [
            ['id' => 0, 'name' => '0 Stars'],
            ['id' => 1, 'name' => '1 Star'],
            ['id' => 2, 'name' => '2 Stars'],
            ['id' => 3, 'name' => '3 Stars'],
            ['id' => 4, 'name' => '4 Stars'],
            ['id' => 5, 'name' => '5 Stars'],
            ['id' => 6, 'name' => '6 Stars'],
        ];
    }
}
