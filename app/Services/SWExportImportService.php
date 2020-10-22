<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Models\User;

class SWExportImportService
{
    /**
     * @var \App\Importers\MonsterImporter
     */
    protected $monsterImporter;

    /**
     * @var \App\Importers\TeamImporter
     */
    protected $teamImporter;

    /**
     * @var \App\Importers\RuneImporter
     */
    protected $runeImporter;

    /**
     * @var \App\Importers\InventoryImporter
     */
    protected $inventoryImporter;

    /**
     * @var \App\Importers\BuildingImporter
     */
    protected $buildingImporter;

    public function __construct()
    {
        $this->monsterImporter = resolve('App\Importers\MonsterImporter');
        $this->teamImporter = resolve('App\Importers\TeamImporter');
        $this->runeImporter = resolve('App\Importers\RuneImporter');
        $this->inventoryImporter = resolve('App\Importers\InventoryImporter');
        $this->buildingImporter = resolve('App\Importers\BuildingImporter');
    }

    public function import(User $user, Collection $data)
    {
        logger('Importing new user data for: '.$user->username);

        // Get wizard data
        $playerData = collect($data->get('wizard_info'));
        $dimensionalHoleData = collect($data->get('dimension_hole_info'));
        $playerId = $playerData->get('wizard_id');

        $player = null;

        // Check to see if the user has a player
        if (!$player = $user->players->where('player_id', $playerId)->first()) {
            // Create a new wizard
            $player = $user->players()->create([
                'player_id' => $playerData->get('wizard_id'),
                'name' => $playerData->get('wizard_name'),
                'level' => $playerData->get('wizard_level'),
                'unit_slots' => $playerData->get('unit_slots')['number'],
                'current_crystals' => $playerData->get('wizard_crystal'),
                'current_mana' => $playerData->get('wizard_mana'),
                'current_dimensional_hole_crystals' => $dimensionalHoleData->get('energy'),
                'energy_max' => $playerData->get('energy_max'),
                'energy_per_min' => $playerData->get('energy_per_min'),
                'rep_unit_id' => $playerData->get('rep_unit_id'),
                'last_login' => $playerData->get('wizard_last_login'),
            ]);
        }

        // Import monsters
        $this->monsterImporter->import($player, collect($data->get('unit_list')));

        // Import teams
        $this->teamImporter->import($player, collect($data->get('deck_recent_list')));

        // Import runes
        $this->runeImporter->import($player, collect($data->get('runes')));

        // Import inventory
        $this->inventoryImporter->import($player, collect($data->get('inventory_info')));

        // Import buildings
        $this->buildingImporter->import($player, collect($data->get('deco_list')));

        return true;
    }
}
