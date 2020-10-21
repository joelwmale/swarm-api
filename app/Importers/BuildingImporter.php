<?php

namespace App\Importers;

use Illuminate\Support\Collection;
use App\Models\Building;
use App\Models\Player;

class BuildingImporter
{
    public function import(Player $player, Collection $buildings)
    {
        // Loop through each rune
        $buildings->each(function ($building) use ($player) {
            // Turn into collection
            $building = collect($building);

            $gameBuilding = Building::where('game_id', $building->get('master_id'))->first();

            if (!$gameBuilding) {
                logger('Tried to import a player building but couldnt find game building.', $building->toArray());
            }
            // @TODO validate each building

            $player->buildings()->updateOrCreate(
                    ['deco_id' => $building->get('deco_id')],
                    [
                        'building_id' => $gameBuilding->id,
                        'deco_id'     => $building->get('deco_id'),
                        'level'       => $building->get('level'),
                    ]
                );
        });

        return true;
    }
}
