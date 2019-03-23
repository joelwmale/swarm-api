<?php

namespace Swarfarm\Support;

use Swarfarm\Wizards\Wizard;
use Illuminate\Support\Collection;
use Swarfarm\Mappers\InventoryMapper;

class InventoryImporter
{
    public function import(Wizard $wizard, Collection $items)
    {
        // Loop through each item
        $items->each(function ($item) use ($wizard) {
            // Turn into collection
            $item = collect($item);

            // Get the models associated with this inventory item
            $model = InventoryMapper::getGameClassFor($item->get('item_master_type'));

            if (! empty($model)) {
                // Make a new game class
                $inventorable = $model::find($item->get('item_master_id'));

                // If we successfully created a wizard class
                if ($inventorable) {
                    // Add the items to the inventory
                    $wizard->inventoryItems()->updateOrCreate(
                        ['inventorable_id' => $inventorable->id], [
                            'inventorable_id' => $inventorable->id,
                            'inventorable_type' => get_class($inventorable),
                            'quantity' => $item->get('item_quantity'),
                        ]);
                }
            } else {
                logger('Found item master type of: '.$item->get('item_master_type').', but found no game class');
            }
        });

        return true;
    }
}
