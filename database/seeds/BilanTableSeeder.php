<?php

use App\Bilan;
use Illuminate\Database\Seeder;

class BilanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Bilan::class, 100)->create();
    }
}


// Bilan::create([]);