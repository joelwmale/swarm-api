<?php

use Illuminate\Database\Seeder;
use Swarm\Runes\RuneQuality;

class RuneQualitySeeder extends Seeder
{
    /**
     * Seed the rune qualities table.
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
            ['id' => 5, 'name' => 'Legend'],
        ];
    }
}
