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
        $gameBuilding = $this->getGameBuildings();

        foreach ($gameBuilding as $building) {
            GameBuilding::create($building);
        }
    }

    protected function getGameBuildings(): array
    {
        return [
            [
                'game_id' => 4,
                'game_name' => 'guardstone',
                'name' => 'Guardstone',
                'max_level' => 10,
                'asset' => 'guardstone.png'
            ],
            [
                'game_id' => 5,
                'game_name' => 'mana_fountain',
                'name' => 'Mana Fountain',
                'max_level' => 10,
                'asset' => 'mana_fountain.png'
            ],
            [
                'game_id' => 6,
                'game_name' => 'sky_tribe_totem',
                'name' => 'Sky Tribe Totem',
                'max_level' => 10,
                'asset' => 'sky_tribe_totem.png'
            ],
            [
                'game_id' => 7,
                'game_name' => 'arcane_booster_tower',
                'name' => 'Arcane Booster Tower',
                'max_level' => 10,
                'asset' => 'arcane_booster_tower.png'
            ],
            [
                'game_id' => 8,
                'game_name' => 'crystal_altar',
                'name' => 'Crystal Altar',
                'max_level' => 10,
                'asset' => 'crystal_altar.png'
            ],
            [
                'game_id' => 9,
                'game_name' => 'ancient_sword',
                'name' => 'Ancient Sword',
                'max_level' => 10,
                'asset' => 'ancient_sword.png'
            ],
            [
                'game_id' => 10,
                'game_name' => 'sanctum_of_energy',
                'name' => 'Sanctum of Energy',
                'max_level' => 10,
                'asset' => 'sanctum_of_energy.png'
            ],
            [
                'game_id' => 11,
                'game_name' => 'mysterious_plant',
                'name' => 'Mysterious Plant',
                'max_level' => 10,
                'asset' => 'mysterious_plant.png'
            ],
            [
                'game_id' => 15,
                'game_name' => 'fire_sanctuary',
                'name' => 'Fire Santuary',
                'max_level' => 10,
                'asset' => 'fire_sanctuary.png'
            ],
            [
                'game_id' => 16,
                'game_name' => 'water_sanctuary',
                'name' => 'Water Santuary',
                'max_level' => 10,
                'asset' => 'water_sanctuary.png'
            ],
            [
                'game_id' => 17,
                'game_name' => 'wind_sanctuary',
                'name' => 'Wind Santuary',
                'max_level' => 10,
                'asset' => 'wind_sanctuary.png'
            ],
            [
                'game_id' => 18,
                'game_name' => 'light_sanctuary',
                'name' => 'Light Santuary',
                'max_level' => 10,
                'asset' => 'light_sanctuary.png'
            ],
            [
                'game_id' => 19,
                'game_name' => 'dark_sanctuary',
                'name' => 'Dark Santuary',
                'max_level' => 10,
                'asset' => 'dark_sanctuary.png'
            ],
            [
                'game_id' => 31,
                'game_name' => 'fallen_ancient_guardian',
                'name' => 'Fallen Ancient Guardian',
                'max_level' => 10,
                'asset' => 'fallen_ancient_guardian.png'
            ],
            [
                'game_id' => 34,
                'game_name' => 'crystal_rock',
                'name' => 'Crystal Rock',
                'max_level' => 10,
                'asset' => 'crystal_rock.png'
            ],
            [
                'game_id' => 35,
                'game_name' => 'fairy_tree',
                'name' => 'Fairy Tree',
                'max_level' => 10,
                'asset' => 'fairy_tree.png'
            ],
            [
                'game_id' => 36,
                'game_name' => 'flag_of_battle',
                'name' => 'Flag of Battle',
                'max_level' => 10,
                'asset' => 'flag_of_battle.png'
            ],
            [
                'game_id' => 37,
                'game_name' => 'flag_of_rage',
                'name' => 'Flag of Rage',
                'max_level' => 10,
                'asset' => 'flag_of_rage.png'
            ],
            [
                'game_id' => 38,
                'game_name' => 'flag_of_hope',
                'name' => 'Flag of Hope',
                'max_level' => 10,
                'asset' => 'flag_of_hope.png'
            ],
            [
                'game_id' => 39,
                'game_name' => 'flag_of_will',
                'name' => 'Flag of Will',
                'max_level' => 10,
                'asset' => 'flag_of_will.png'
            ],
        ];
    }
}
