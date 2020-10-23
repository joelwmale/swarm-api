<?php

namespace App\Importers;

use Illuminate\Support\Collection;
use App\Models\Player;

class RuneImporter
{
    public function import(Player $player, Collection $runes)
    {
        // Loop through each rune
        $runes->each(function ($rune) use ($player) {
            // Turn into collection
            $rune = collect($rune);

            // @TODO validate each rune

            // dd($rune->get('pri_eff'));

            $player->runes()->updateOrCreate(
                    ['rune_id' => $rune->get('rune_id')],
                    [
                        'rune_id'  => $rune->get('rune_id'),
                        'set_id'   => $rune->get('set_id'),

                        'occupied'       => $rune->get('occupied_id') ? true : false,
                        'player_unit_id' => $rune->get('occupied_id'),

                        'slot'             => $rune->get('slot_no'),
                        'quality'          => intval($rune->get('rank')), // rune quality (e.g 1 = common, 2 = magic)
                        'rank'             => $rune->get('class'), // class is actually the rank (star count)

                        'current_level' => $rune->get('upgrade_curr'),
                        'max_level'     => $rune->get('upgrade_limit'),

                        'base_value' => $rune->get('base_value'),
                        'sell_value' => $rune->get('sell_value'),

                        'primary_effect'   => $rune->get('pri_eff'),
                        'innate_effect'    => $rune->get('prefix_eff') ? $rune->get('prefix_eff') : null,
                        'secondary_effects' => $rune->get('sec_eff'),
                    ]
                );
        });

        return true;
    }
}
