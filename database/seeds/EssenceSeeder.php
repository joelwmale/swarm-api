<?php

use Illuminate\Database\Seeder;
use Swarm\Game\Essence;

class EssenceSeeder extends Seeder
{
    /**
     * Seed the rune sets table.
     *
     * @return void
     */
    public function run()
    {
        $essences = $this->getEssences();

        foreach ($essences as $essence) {
            Essence::create($essence);
        }
    }

    protected function getEssences(): array
    {
        return [
            ['id' => 11006, 'raw_name' => 'essence_magic_low', 'name' => 'Magic Essence (low)', 'asset' => 'magic_low.png'],
            ['id' => 12006, 'raw_name' => 'essence_magic_mid', 'name' => 'Magic Essence (mid)', 'asset' => 'magic_mid.png'],
            ['id' => 13006, 'raw_name' => 'essence_magic_high', 'name' => 'Magic Essence (high)', 'asset' => 'magic_high.png'],

            ['id' => 11001, 'raw_name' => 'essence_water_low', 'name' => 'Water Essence (low)', 'asset' => 'water_low.png'],
            ['id' => 12001, 'raw_name' => 'essence_water_mid', 'name' => 'Water Essence (mid)', 'asset' => 'water_mid.png'],
            ['id' => 13001, 'raw_name' => 'essence_water_high', 'name' => 'Water Essence (high)', 'asset' => 'water_high.png'],

            ['id' => 11002, 'raw_name' => 'essence_fire_low', 'name' => 'Fire Essence (low)', 'asset' => 'fire_low.png'],
            ['id' => 12002, 'raw_name' => 'essence_fire_mid', 'name' => 'Fire Essence (mid)', 'asset' => 'fire_mid.png'],
            ['id' => 13002, 'raw_name' => 'essence_fire_high', 'name' => 'Fire Essence (high)', 'asset' => 'fire_high.png'],

            ['id' => 11003, 'raw_name' => 'essence_wind_low', 'name' => 'Wind Essence (low)', 'asset' => 'wind_low.png'],
            ['id' => 12003, 'raw_name' => 'essence_wind_mid', 'name' => 'Wind Essence (mid)', 'asset' => 'wind_mid.png'],
            ['id' => 13003, 'raw_name' => 'essence_wind_high', 'name' => 'Wind Essence (high)', 'asset' => 'wind_high.png'],

            ['id' => 11004, 'raw_name' => 'essence_light_low', 'name' => 'Light Essence (low)', 'asset' => 'light_low.png'],
            ['id' => 12004, 'raw_name' => 'essence_light_mid', 'name' => 'Light Essence (mid)', 'asset' => 'light_mid.png'],
            ['id' => 13004, 'raw_name' => 'essence_light_high', 'name' => 'Light Essence (high)', 'asset' => 'light_high.png'],

            ['id' => 11005, 'raw_name' => 'essence_dark_low', 'name' => 'Dark Essence (low)', 'asset' => 'dark_low.png'],
            ['id' => 12005, 'raw_name' => 'essence_dark_mid', 'name' => 'Dark Essence (mid)', 'asset' => 'dark_mid.png'],
            ['id' => 13005, 'raw_name' => 'essence_dark_high', 'name' => 'Dark Essence (high)', 'asset' => 'dark_high.png'],
        ];
    }
}
