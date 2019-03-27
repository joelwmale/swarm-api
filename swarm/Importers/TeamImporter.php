<?php

namespace Swarm\Importers;

use Illuminate\Support\Collection;
use Swarm\Players\Player;

class TeamImporter
{
    public function import(Player $player, Collection $teams)
    {
        // Loop through each unit
        $teams->each(function ($team) use ($player) {
            // Turn into collection
            $team = collect($team);

            // @TODO validate team

            // Make a new unit or update an exisiting
            $player->teams()->updateOrCreate(
                ['type' => $team->get('type'), 'sub_type' => $team->get('sub_type')], [
                'type'           => $team->get('type'),
                'sub_type'       => $team->get('sub_type'),
                'leader_unit_id' => $team->get('leader_unit_id'),
                'team_units'     => $team->get('unit_id_list'),
            ]);
        });

        return true;
    }
}
