<?php

namespace Swarm\Importers;

use Swarm\Wizards\Wizard;
use Illuminate\Support\Collection;

class BuildingImporter
{
    public function import(Wizard $wizard, Collection $buildings)
    {
        // Loop through each rune
        $buildings->each(function ($building) use ($wizard) {
            // Turn into collection
            $building = collect($building);

            // @TODO validate each building

            $wizard->buildings()->updateOrCreate(
                    ['deco_id' => $building->get('deco_id')],
                    [
                        'deco_id' => $building->get('deco_id'),
                        'building_id' => $building->get('master_id'),
                        'level' => $building->get('level')
                    ]
                );
        });

        return true;
    }
}
