<?php

namespace Swarm\Services;

use Illuminate\Support\Collection;
use Swarm\Users\User;

class SWExportImportService
{
    /**
     * @var \Swarm\Importers\MonsterImporter
     */
    protected $monsterImporter;

    /**
     * @var \Swarm\Importers\RuneImporter
     */
    protected $runeImporter;

    /**
     * @var \Swarm\Importers\InventoryImporter
     */
    protected $inventoryImporter;

    /**
     * @var \Swarm\Importers\BuildingImporter
     */
    protected $buildingImporter;

    public function __construct()
    {
        $this->monsterImporter = resolve('Swarm\Importers\MonsterImporter');
        $this->runeImporter = resolve('Swarm\Importers\RuneImporter');
        $this->inventoryImporter = resolve('Swarm\Importers\InventoryImporter');
        $this->buildingImporter = resolve('Swarm\Importers\BuildingImporter');
    }

    public function import(User $user, Collection $data)
    {
        logger('Importing new user data for: '.$user->username);

        // Get wizard data
        $playerData = collect($data->get('wizard_info'));
        $playerId = $playerData->get('wizard_id');

        $player = null;

        // Check to see if the user has a player
        if (!$player = $user->players->where('player_id', $playerId)->first()) {
            // Create a new wizard
            $player = $user->players()->create([
                'player_id'      => $playerData->get('wizard_id'),
                'player_name'    => $playerData->get('wizard_name'),
                'player_level'   => $playerData->get('wizard_level'),
                'player_mana'    => $playerData->get('wizard_mana'),
                'player_crystal' => $playerData->get('wizard_crystal'),
                'energy_max'     => $playerData->get('energy_max'),
                'energy_per_min' => $playerData->get('energy_per_min'),
                'rep_unit_id'    => $playerData->get('rep_unit_id'),
                'last_login'     => $playerData->get('wizard_last_login'),
            ]);
        }

        // Import monsters
        $this->monsterImporter->import($player, collect($data->get('unit_list')));

        // Import runes
        $this->runeImporter->import($player, collect($data->get('runes')));

        // Import inventory
        $this->inventoryImporter->import($player, collect($data->get('inventory_info')));

        // Import buildings
        $this->buildingImporter->import($player, collect($data->get('deco_list')));

        return true;
    }
}
