<?php

use App\Eleve;
use Illuminate\Database\Seeder;

class EleveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Eleve::class, 1000)->create();
    }
}
