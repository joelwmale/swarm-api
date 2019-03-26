<?php

namespace Swarm\Importers;

use Illuminate\Support\Collection;
use Swarm\Maps\InventoryMapper;
use Swarm\Players\Player;

class InventoryImporter
{
    const MONSTER_PIECE_ID = 12;

    public function import(Player $player, Collection $items)
    {
        // Take monster pieces out of the inventory items
        $monsterPieces = clone $items;
        $monsterPieces = $monsterPieces->where('item_master_type', self::MONSTER_PIECE_ID);

        // Get everything except monster pieces
        $items = $items->where('item_master_type', '!=', self::MONSTER_PIECE_ID);

        // Import monster pieces
        $monsterPieceImporter = resolve('Swarm\Importers\MonsterPieceImporter');
        $monsterPieceImporter->import($player, $monsterPieces);

        // Loop through each item
        $items->each(function ($item) use ($player) {
            // Turn into collection
            $item = collect($item);

            // Get the models associated with this inventory item
            $model = InventoryMapper::getGameClassFor($item->get('item_master_type'));

            if (!empty($model)) {
                // Make a new game class
                $inventorable = $model::find($item->get('item_master_id'));

                // If we successfully found a model
                if ($inventorable) {
                    // Add the items to the inventory
                    $player->inventoryItems()->updateOrCreate(
                        ['inventorable_id' => $inventorable->id], [
                            'inventorable_id'   => $inventorable->id,
                            'inventorable_type' => get_class($inventorable),
                            'quantity'          => $item->get('item_quantity'),
                        ]);
                }
            } else {
                logger('Found item master type of: '.$item->get('item_master_type').', but found no game class');
            }
        });

        return true;
    }
}
