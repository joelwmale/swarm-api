<?php

namespace Swarm\Importers;

use Illuminate\Support\Collection;
use Swarm\Game\GameMonster;
use Swarm\Players\Player;

class MonsterPieceImporter
{
    public function import(Player $player, Collection $monsterPieces)
    {
        // Loop through each item
        $monsterPieces->each(function ($piece) use ($player) {
            // Turn into collection
            $piece = collect($piece);

            // Get the monster
            $monster = GameMonster::find($piece->get('item_master_id'));

            if (!$monster) {
                logger('Could not find monster for unit piece.', $piece->toArray());
            }

            // Create this monster piece
            $player->unitPieces()->create([
                    'monster_id'   => $monster->id,
                    'quantity'     => $piece->get('item_quantity'),
                ]);
        });

        return true;
    }
}
