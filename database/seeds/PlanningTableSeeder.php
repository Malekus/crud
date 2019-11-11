<?php

use App\Planning;
use Illuminate\Database\Seeder;

class PlanningTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Planning::class, 100)->create();
    }
}


// Planning::create([]);