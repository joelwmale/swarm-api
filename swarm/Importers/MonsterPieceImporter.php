<?php

namespace Swarm\Importers;

use Swarm\Wizards\Wizard;
use Illuminate\Support\Collection;
use Swarm\Attributes\Attribute;
use Swarm\Monsters\Monster;

class MonsterPieceImporter
{

    public function import(Wizard $wizard, Collection $monsterPieces)
    {
        // Loop through each item
        $monsterPieces->each(function ($piece) use ($wizard) {
            // Turn into collection
            $piece = collect($piece);

            $attributeId = substr($piece->get('item_master_id'), -1);
            // Get the monster by removing the attribute, and the 0 between
            $monsterId = substr($piece->get('item_master_id'), 0, -2);

            // Get the attribute
            $attribute = Attribute::find($attributeId);

            // Get the monster
            $monster = Monster::find($monsterId);

            if ($monster && $attribute) {
                // Create this monster piece
                $wizard->unitPieces()->create([
                    'monster_id' => $monster->id,
                    'attribute_id' => $attribute->id,
                    'quantity' => $piece->get('item_quantity')
                ]);
            } else {
                // error, couldnt find a matching monster
                // @TODO
            }
        });

        return true;
    }
}
