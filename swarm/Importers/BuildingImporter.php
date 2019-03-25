<?php

namespace Swarm\Importers;

use Illuminate\Support\Collection;
use Swarm\Players\Player;

class BuildingImporter
{
    public function import(Player $player, Collection $buildings)
    {
        // Loop through each rune
        $buildings->each(function ($building) use ($player) {
            // Turn into collection
            $building = collect($building);

            // @TODO validate each building

            $player->buildings()->updateOrCreate(
                    ['deco_id' => $building->get('deco_id')],
                    [
                        'deco_id'     => $building->get('deco_id'),
                        'building_id' => $building->get('master_id'),
                        'level'       => $building->get('level'),
                    ]
                );
        });

        return true;
    }
}
