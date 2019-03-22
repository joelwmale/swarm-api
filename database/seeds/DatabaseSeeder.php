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
        $this->call(MonsterClassSeeder::class);
        $this->call(MonsterSeeder::class);
        $this->call(RuneEffectSeeder::class);
        $this->call(RuneQualitySeeder::class);
        $this->call(RuneSetSeeder::class);
    }
}
