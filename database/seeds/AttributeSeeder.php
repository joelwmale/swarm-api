<?php

use Illuminate\Database\Seeder;
use Swarfarm\Attributes\Attribute;

class AttributeSeeder extends Seeder
{
    /**
     * Seed the attributes table
     *
     * @return void
     */
    public function run()
    {
        $attributes = $this->getAttributes();

        foreach ($attributes as $attribute) {
            Attribute::create($attribute);
        }
    }

    protected function getAttributes(): array
    {
        return [
            ['id' => 1, 'name' => 'Water'],
            ['id' => 2, 'name' => 'Fire'],
            ['id' => 3, 'name' => 'Wind'],
            ['id' => 4, 'name' => 'Light'],
            ['id' => 5, 'name' => 'Dark']
        ];
    }
}
