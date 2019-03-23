<?php

use Illuminate\Database\Seeder;
use Swarm\Game\CraftMaterial;

class CraftMaterialSeeder extends Seeder
{
    /**
     * Seed the rune sets table.
     *
     * @return void
     */
    public function run()
    {
        $craftMaterials = $this->getCraftMaterials();

        foreach ($craftMaterials as $craftMaterial) {
            CraftMaterial::create($craftMaterial);
        }
    }

    protected function getCraftMaterials(): array
    {
        return [
            ['id' => 1001, 'raw_name' => 'wood', 'name' => 'Wood', 'asset' => 'wood.png'],
            ['id' => 1002, 'raw_name' => 'leather', 'name' => 'Leather', 'asset' => 'leather.png'],
            ['id' => 1003, 'raw_name' => 'rock', 'name' => 'Rock', 'asset' => 'rock.png'],
            ['id' => 1004, 'raw_name' => 'ore', 'name' => 'Ore', 'asset' => 'ore.png'],
            ['id' => 1005, 'raw_name' => 'mithril', 'name' => 'Mithril', 'asset' => 'mithril.png'],
            ['id' => 1006, 'raw_name' => 'cloth', 'name' => 'Cloth', 'asset' => 'cloth.png'],
            ['id' => 2001, 'raw_name' => 'rune_piece', 'name' => 'Rune Pieces', 'asset' => 'rune_piece.png'],
            ['id' => 3001, 'raw_name' => 'powder', 'name' => 'Powder', 'asset' => 'powder.png'],
            ['id' => 4001, 'raw_name' => 'symbol_harmony', 'name' => 'Symbol of Harmony', 'asset' => 'symbol_harmony.png'],
            ['id' => 4002, 'raw_name' => 'symbol_transcendance', 'name' => 'Smybol of Transendance', 'asset' => 'symbol_transcendance.png'],
            ['id' => 4003, 'raw_name' => 'symbol_chaos', 'name' => 'Symbol of Chaos', 'asset' => 'symbol_chaos.png'],
            ['id' => 5001, 'raw_name' => 'crystal_water', 'name' => 'Frozen Water Crystal', 'asset' => 'crystal_water.png'],
            ['id' => 5002, 'raw_name' => 'crystal_fire', 'name' => 'Flaming Fire Crystal', 'asset' => 'crystal_fire.png'],
            ['id' => 5003, 'raw_name' => 'crystal_wind', 'name' => 'Whirling Wind Crystal', 'asset' => 'crystal_wind.png'],
            ['id' => 5004, 'raw_name' => 'crystal_light', 'name' => 'Shiny Light Crystal', 'asset' => 'crystal_light.png'],
            ['id' => 5005, 'raw_name' => 'crystal_dark', 'name' => 'Pitch-black Dark Crystal', 'asset' => 'crystal_dark.png'],
            ['id' => 6001, 'raw_name' => 'crystal_magic', 'name' => 'Condensed Magic Crystal', 'asset' => 'crystal_magic.png'],
            ['id' => 7001, 'raw_name' => 'crystal_pure', 'name' => 'Pure Magic Crystal', 'asset' => 'crystal_pure.png'],
        ];
    }
}
