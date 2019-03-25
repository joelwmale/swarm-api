<?php

use Illuminate\Database\Seeder;
use Swarm\Game\GameBuilding;

class GameBuildingSeeder extends Seeder
{
    /**
     * Seed the rune sets table.
     *
     * @return void
     */
    public function run()
    {
        $buildings = $this->getBuildings();

        foreach ($buildings as $building) {
            GameBuilding::create($building);
        }
    }

    protected function getBuildings(): array
    {
        // @TODO add max levels
        return [
            ['id' => 4, 'raw_name' => 'guardstone', 'name' => 'Guardstone', 'asset' => 'guardstone.png'],
            ['id' => 5, 'raw_name' => 'mana_fountain', 'name' => 'Mana Fountain', 'asset' => 'mana_fountain.png'],
            ['id' => 6, 'raw_name' => 'sky_tribe_totem', 'name' => 'Sky Tribe Totem', 'asset' => 'sky_tribe_totem.png'],
            ['id' => 7, 'raw_name' => 'arcane_booster_tower', 'name' => 'Arcane Booster Tower', 'asset' => 'arcane_booster_tower.png'],
            ['id' => 8, 'raw_name' => 'crystal_altar', 'name' => 'Crystal Altar', 'asset' => 'crystal_altar.png'],
            ['id' => 9, 'raw_name' => 'ancient_sword', 'name' => 'Ancient Sword', 'asset' => 'ancient_sword.png'],
            ['id' => 10, 'raw_name' => 'sanctum_of_energy', 'name' => 'Sanctum of Energy', 'asset' => 'sanctum_of_energy.png'],
            ['id' => 11, 'raw_name' => 'mysterious_plant', 'name' => 'Mysterious Plant', 'asset' => 'mysterious_plant.png'],
            ['id' => 15, 'raw_name' => 'fire_sanctuary', 'name' => 'Fire Santuary', 'asset' => 'fire_sanctuary.png'],
            ['id' => 16, 'raw_name' => 'water_sanctuary', 'name' => 'Water Santuary', 'asset' => 'water_sanctuary.png'],
            ['id' => 17, 'raw_name' => 'wind_sanctuary', 'name' => 'Wind Santuary', 'asset' => 'wind_sanctuary.png'],
            ['id' => 18, 'raw_name' => 'light_sanctuary', 'name' => 'Light Santuary', 'asset' => 'light_sanctuary.png'],
            ['id' => 19, 'raw_name' => 'dark_sanctuary', 'name' => 'Dark Santuary', 'asset' => 'dark_sanctuary.png'],
            ['id' => 31, 'raw_name' => 'fallen_ancient_guardian', 'name' => 'Fallen Ancient Guardian', 'asset' => 'fallen_ancient_guardian.png'],
            ['id' => 34, 'raw_name' => 'crystal_rock', 'name' => 'Crystal Rock', 'asset' => 'crystal_rock.png'],
            ['id' => 35, 'raw_name' => 'fairy_tree', 'name' => 'Fairy Tree', 'asset' => 'fairy_tree.png'],
            ['id' => 36, 'raw_name' => 'flag_of_battle', 'name' => 'Flag of Battle', 'asset' => 'flag_of_battle.png'],
            ['id' => 37, 'raw_name' => 'flag_of_rage', 'name' => 'Flag of Rage', 'asset' => 'flag_of_rage.png'],
            ['id' => 38, 'raw_name' => 'flag_of_hope', 'name' => 'Flag of Hope', 'asset' => 'flag_of_hope.png'],
            ['id' => 39, 'raw_name' => 'flag_of_will', 'name' => 'Flag of Will', 'asset' => 'flag_of_will.png'],
        ];
    }
}
