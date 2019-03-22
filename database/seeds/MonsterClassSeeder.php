<?php

use Swarfarm\Monster\MonsterClass;
use Illuminate\Database\Seeder;

class MonsterClassSeeder extends Seeder
{
    /**
     * Seed the attributes table.
     *
     * @return void
     */
    public function run()
    {
        $monsterClasses = $this->getMonsterClasses();

        foreach ($monsterClasses as $monsterClass) {
            MonsterClass::create($monsterClass);
        }
    }

    protected function getMonsterClasses(): array
    {
        return [
            ['id' => 0, 'name' => 'Common'],
            ['id' => 1, 'name' => 'Magic'],
            ['id' => 2, 'name' => 'Rare'],
            ['id' => 3, 'name' => 'Hero'],
            ['id' => 4, 'name' => 'Legendary'],
        ];
    }
}
