<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AttributeSeeder::class);

        // Misc
        $this->call(GameClassSeeder::class);
        $this->call(EssenceSeeder::class);
        $this->call(CraftMaterialSeeder::class);
        $this->call(BuildingSeeder::class);

        // Monsters
        $this->call(MonsterSeeder::class);

        // Runes
        $this->call(RuneMainstatSeeder::class);
        $this->call(RuneSubstateeder::class);
        $this->call(RuneEffectSeeder::class);
        $this->call(RuneQualitySeeder::class);
        $this->call(RuneSetSeeder::class);

        // Users
        $this->call(UserSeeder::class);
    }
}
