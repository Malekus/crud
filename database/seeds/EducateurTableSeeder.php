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
        factory(Educateur::class, 100)->create();
    }
}


// Educateur::create([]);