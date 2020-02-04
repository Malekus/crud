<?php

use App\Etablissement;
use Illuminate\Database\Seeder;

class EtablissementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Etablissement::create(['nom' => 'Joliot Curie', 'ville' => 'Stains']);
        Etablissement::create(['nom' => 'Pablo Neruda', 'ville' => 'Stains']);
        Etablissement::create(['nom' => 'Barbara', 'ville' => 'Stains']);
        Etablissement::create(['nom' => 'Collège Travail', 'ville' => 'Bagnolet']);
        Etablissement::create(['nom' => 'Collège Politzer', 'ville' => 'Bagnolet']);
        Etablissement::create(['nom' => 'Jean Vigo', 'ville' => 'Épinay-sur-Seine']);
        Etablissement::create(['nom' => 'Roger Martin du Garo', 'ville' => 'Épinay-sur-Seine']);
        Etablissement::create(['nom' => 'Evariste Galois', 'ville' => 'Épinay-sur-Seine']);
    }
}
