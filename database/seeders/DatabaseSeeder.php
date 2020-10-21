<?php

namespace Database\Seeders;

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
        $this->call(AttributeSeeder::class);
        // Misc
        $this->call(EssenceSeeder::class);
        $this->call(CraftMaterialSeeder::class);
        $this->call(BuildingSeeder::class);
        // Monsters
        $this->call(MonsterSeeder::class);
        // Runes
        $this->call(RuneSetSeeder::class);
        // Users
        $this->call(UserSeeder::class);
    }
}
