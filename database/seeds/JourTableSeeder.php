<?php

use App\Jour;
use Illuminate\Database\Seeder;

class JourTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Jour::class, 300)->create();
    }
}


// Jour::create([]);
