<?php

namespace Swarm\Importers;

use Illuminate\Support\Collection;
use Swarm\Game\GameMonster;
use Swarm\Players\Player;

class MonsterImporter
{
    public function import(Player $player, Collection $units)
    {
        // Loop through each unit
        $units->each(function ($unit) use ($player) {
            // Turn into collection
            $unit = collect($unit);

            // @TODO validate each unit
            $monster = GameMonster::find($unit->get('unit_master_id'));

            if (!$monster) {
                // Skip import
                logger('Could not find game monster for import.', $unit->toArray());

                return true;
            }

            // @TODO validate monster

            // Make a new unit or update an exisiting
            $player->units()->updateOrCreate(
                ['unit_id' => $unit->get('unit_id')], [
                'unit_id'      => $unit->get('unit_id'),
                'monster_id'   => $monster->id,
                'rank'         => $unit->get('class'),
                'level'        => $unit->get('unit_level'),
                'stats'        => [
                    'con'             => $unit->get('con'),
                    'attack'          => $unit->get('atk'),
                    'defence'         => $unit->get('def'),
                    'speed'           => $unit->get('spd'),
                    'resist'          => $unit->get('resist'),
                    'critical_rate'   => $unit->get('critical_rate'),
                    'critical_damage' => $unit->get('critical_damage'),
                ],
                'skills'   => $unit->get('skills'),
                'summoned' => $unit->get('create_time'),
            ]);

            // Import the runes for the unit
            $runeImporter = resolve('Swarm\Importers\RuneImporter');
            $runeImporter->import($player, collect($unit->get('runes')));
        });

        return true;
    }
}
