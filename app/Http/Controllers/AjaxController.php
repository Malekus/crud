<?php

namespace App\Http\Controllers;

use App\Jour;
use Carbon\Carbon;
use Illuminate\Http\Request;


class AjaxController extends Controller
{
    public function jour(Request $request){
        $jours = Jour::with('planning.bilan.eleve.etablissement')->where("dateExclu", $request->get('date'))->get()->sortBy('ville')->sortBy('etablissement')->sortBy('nom_prenom');
        $r = [];
        foreach ($jours as $jour){
            if(!array_key_exists($jour->ville, $r)){
                $r[$jour->ville] = [$jour];
            }
            else{
                array_push($r[$jour->ville], $jour);
            }
        }
        return view('ajax.jours', ['jours' => $r]);
    }

    public function test()
    {
        $jours = Jour::where("dateExclu", "2019-11-15")->get()->sortBy('ville')->sortBy('etablissement')->sortBy('nom_prenom');
        $r = [];
        foreach ($jours as $jour){
            if(!array_key_exists($jour->ville, $r)){
                $r[$jour->ville] = [$jour];
            }
            else{
                array_push($r[$jour->ville], $jour);
            }
        }
        return view('ajax.jour', ['jours' => $r]);
    }
}
