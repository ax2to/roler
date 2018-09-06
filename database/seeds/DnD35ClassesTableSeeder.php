<?php

use Illuminate\Database\Seeder;

class DnD35ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\DnD35\BaseClass::class)->create(['name' => 'Barbarian']);
        factory(\App\Models\DnD35\BaseClass::class)->create(['name' => 'Bard']);
        factory(\App\Models\DnD35\BaseClass::class)->create(['name' => 'Cleric']);
        factory(\App\Models\DnD35\BaseClass::class)->create(['name' => 'Druid']);
        factory(\App\Models\DnD35\BaseClass::class)->create(['name' => 'Fighter']);
        factory(\App\Models\DnD35\BaseClass::class)->create(['name' => 'Monk']);
        factory(\App\Models\DnD35\BaseClass::class)->create(['name' => 'Paladin']);
        factory(\App\Models\DnD35\BaseClass::class)->create(['name' => 'Ranger']);
        factory(\App\Models\DnD35\BaseClass::class)->create(['name' => 'Rogue']);
        factory(\App\Models\DnD35\BaseClass::class)->create(['name' => 'Sorcerer']);
        factory(\App\Models\DnD35\BaseClass::class)->create(['name' => 'Wizard']);
    }
}
