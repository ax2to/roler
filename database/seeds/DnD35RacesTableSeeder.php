<?php

use Illuminate\Database\Seeder;

class DnD35RacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\DnD35\Race::class)->create(['name' => 'Human']);
    }
}
