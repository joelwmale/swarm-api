<?php

namespace Swarm\Importers;

use Illuminate\Support\Collection;
use Swarm\Players\Player;

class RuneImporter
{
    public function import(Player $player, Collection $runes)
    {
        // Loop through each rune
        $runes->each(function ($rune) use ($player) {
            // Turn into collection
            $rune = collect($rune);

            // @TODO validate each rune

            $player->runes()->updateOrCreate(
                    ['rune_id' => $rune->get('rune_id')],
                    [
                        'rune_id'  => $rune->get('rune_id'),
                        'set_id'   => $rune->get('set_id'),

                        'class'          => intval($rune->get('class')), // rune class (e.g 1, 2, 3 stars)
                        'occupied'       => $rune->get('occupied_id') ? true : false,
                        'player_unit_id' => $rune->get('occupied_id'),

                        'slot' => $rune->get('slot_no'),
                        'rank' => $rune->get('rank'), // @TODO maybe make a rune ranks table?

                        'upgrade_max'     => $rune->get('upgrade_limit'),
                        'upgrade_current' => $rune->get('upgrade_curr'),

                        'base_value' => $rune->get('base_value'),
                        'sell_value' => $rune->get('sell_value'),

                        'primary_effect'   => $rune->get('pri_eff'),
                        'prefix_effect'    => $rune->get('prefix_eff'),
                        'secondary_effect' => $rune->get('sec_eff'),
                    ]
                );
        });

        return true;
    }
}
