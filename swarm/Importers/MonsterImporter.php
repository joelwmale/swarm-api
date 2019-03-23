<?php

namespace Swarm\Importers;

use Swarm\Wizards\Wizard;
use Illuminate\Support\Collection;

class MonsterImporter
{
    public function import(Wizard $wizard, Collection $units)
    {
        // Loop through each unit
        $units->each(function ($unit) use ($wizard) {
            // Turn into collection
            $unit = collect($unit);

            // @TODO validate each unit

            // Make a new unit or update an exisiting
            $wizard->units()->updateOrCreate(
                ['unit_id' => $unit->get('unit_id')], [
                'unit_id' => $unit->get('unit_id'),
                'monster_id' => $unit->get('unit_master_id'),
                'class_id' => $unit->get('class'),
                'attribute_id' => $unit->get('attribute'),
                'level' => $unit->get('unit_level'),
                'stats' => [
                    'con' => $unit->get('con'),
                    'attack' => $unit->get('atk'),
                    'defefence' => $unit->get('def'),
                    'speed' => $unit->get('spd'),
                    'resist' => $unit->get('resist'),
                    'critical_rate' => $unit->get('critical_rate'),
                    'critical_damage' => $unit->get('critical_damage'),
                ],
                'skills' => $unit->get('skills'),
                'unlocked' => $unit->get('create_time'),
            ]);

            // Import the runes for the unit
            $runeImporter = resolve('Swarm\Importers\RuneImporter');
            $runeImporter->import($wizard, collect($unit->get('runes')));
        });

        return true;
    }
}
