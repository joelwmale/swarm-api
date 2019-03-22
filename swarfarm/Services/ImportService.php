<?php

namespace Swarfarm\Services;

use Illuminate\Support\Collection;
use Swarfarm\Users\User;
use Swarfarm\Support\MonsterImporter;

class ImportService
{
    /**
     * @var MonsterImporter
     */
    protected $monsterImporter;

    public function __construct(MonsterImporter $monsterImporter)
    {
        $this->monsterImporter = $monsterImporter;
    }

    public function import(User $user, Collection $data)
    {
        // Check to see if the user has a wizard
        if (! $user->wizard) {
            // Get wizard data
            $wizardData = collect($data->get('wizard_info'));

            // Create a new wizard
            $user->wizard()->create([
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
        $this->monsterImporter->import($user->wizard, collect($data->get('unit_list')));

        return true;
    }
}
