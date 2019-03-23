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
        // Get wizard data
        $wizardData = collect($data->get('wizard_info'));
        $wizardId = $wizardData->get('wizard_id');

        $wizard = null;

        // Check to see if the user has a wizard
        if (!$wizard = $user->wizards->where('wizard_id', $wizardId)->first()) {
            // Create a new wizard
            $wizard = $user->wizards()->create([
                'wizard_id'      => $wizardData->get('wizard_id'),
                'wizard_name'    => $wizardData->get('wizard_name'),
                'wizard_level'   => $wizardData->get('wizard_level'),
                'wizard_mana'    => $wizardData->get('wizard_mana'),
                'wizard_crystal' => $wizardData->get('wizard_crystal'),
                'energy_max'     => $wizardData->get('energy_max'),
                'energy_per_min' => $wizardData->get('energy_per_min'),
                'rep_unit_id'    => $wizardData->get('rep_unit_id'),
                'last_login'     => $wizardData->get('wizard_last_login'),
            ]);
        }

        // Import monsters
        $this->monsterImporter->import($wizard, collect($data->get('unit_list')));

        // Import runes
        $this->runeImporter->import($wizard, collect($data->get('runes')));

        // Import inventory
        $this->inventoryImporter->import($wizard, collect($data->get('inventory_info')));

        // Import buildings
        $this->buildingImporter->import($wizard, collect($data->get('deco_list')));

        return true;
    }
}
