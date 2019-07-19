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
        // Attributes
        $this->call(GameAttributeSeeder::class);
        // Misc
        $this->call(GameEssenceSeeder::class);
        $this->call(GameCraftMaterialSeeder::class);
        $this->call(GameBuildingSeeder::class);
        // Monsters
        $this->call(GameMonsterSeeder::class);
        // Runes
        $this->call(GameRuneSetSeeder::class);
        // Users
        $this->call(UserSeeder::class);
    }
}
