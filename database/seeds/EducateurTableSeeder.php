<?php

use App\Educateur;
use Illuminate\Database\Seeder;

class EducateurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Educateur::class, 20)->create();
    }
}


// Educateur::create([]);
