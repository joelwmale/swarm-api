<?php

use Swarfarm\Runes\RuneQuality;
use Illuminate\Database\Seeder;

class RuneQualitySeeder extends Seeder
{
    /**
     * Seed the attributes table.
     *
     * @return void
     */
    public function run()
    {
        $runeQualities = $this->getRuneQualities();

        foreach ($runeQualities as $runeQuality) {
            RuneQuality::create($runeQuality);
        }
    }

    protected function getRuneQualities(): array
    {
        return [
            ['id' => 1, 'name' => 'Common'],
            ['id' => 2, 'name' => 'Magic'],
            ['id' => 3, 'name' => 'Rare'],
            ['id' => 4, 'name' => 'Hero'],
            ['id' => 5, 'name' => 'Legend']
        ];
    }
}
