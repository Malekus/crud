<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EtablissementTableSeeder::class,
            /*
            EducateurTableSeeder::class,
            EleveTableSeeder::class,
            BilanTableSeeder::class,
            PlanningTableSeeder::class,
            JourTableSeeder::class
            */
        ]);
    }
}
