<?php

namespace Swarfarm\Services;

use Swarfarm\Users\User;
use Illuminate\Support\Collection;
use Swarfarm\Support\RuneImporter;
use Swarfarm\Support\MonsterImporter;
use Swarfarm\Support\InventoryImporter;

class ImportService
{
    /**
     * @var MonsterImporter
     */
    protected $monsterImporter;

    /**
     * @var RuneImporter
     */
    protected $runeImporter;

    /**
     * @var InventoryImporter
     */
    protected $inventoryImporter;

    public function __construct(MonsterImporter $monsterImporter, RuneImporter $runeImporter, InventoryImporter $inventoryImporter)
    {
        $this->monsterImporter = $monsterImporter;
        $this->runeImporter = $runeImporter;
        $this->inventoryImporter = $inventoryImporter;
    }

    public function import(User $user, Collection $data)
    {
        // Get wizard data
        $wizardData = collect($data->get('wizard_info'));
        $wizardId = $wizardData->get('wizard_id');

        $wizard = null;

        // Check to see if the user has a wizard
        if (! $wizard = $user->wizards->where('wizard_id', $wizardId)->first()) {
            // Create a new wizard
            $wizard = $user->wizards()->create([
                'wizard_id' => $wizardData->get('wizard_id'),
                'wizard_name' => $wizardData->get('wizard_name'),
                'wizard_level' => $wizardData->get('wizard_level'),
                'wizard_mana' => $wizardData->get('wizard_mana'),
                'wizard_crystal' => $wizardData->get('wizard_crystal'),
                'energy_max' => $wizardData->get('energy_max'),
                'energy_per_min' => $wizardData->get('energy_per_min'),
                'rep_unit_id' => $wizardData->get('rep_unit_id'),
                'last_login' => $wizardData->get('wizard_last_login'),
            ]);
        }

        // Import monsters
        $this->monsterImporter->import($wizard, collect($data->get('unit_list')));

        // Import runes
        $this->runeImporter->import($wizard, collect($data->get('runes')));

        // Import inventory
        $this->inventoryImporter->import($wizard, collect($data->get('inventory_info')));

        return true;
    }
}
