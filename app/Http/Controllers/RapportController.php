<?php

namespace App\Http\Controllers;

use App\Educateur;
use App\Eleve;
use App\Etablissement;
use App\Bilan;
use App\Jour;
use App\Planning;
use PDF;

class RapportController extends Controller
{
    public function index()
    {
        $etablissements = Etablissement::all()->pluck('full_name', 'id');
        $educateurs = Educateur::all()->pluck('full_name', 'id');
        $eleves = Eleve::with('etablissement', 'educateur')->get(); //->with('etablissement');
        return view('rapport.index', compact('eleves'));
    }

    public function exportPDF($id)
    {
        /*
        if ($id == null){
            $eleve = Eleve::find(1);
            return view('rapport.exportPDF', compact(['eleve']));
            $pdf = PDF::loadView('rapport.exportPDF', compact(['eleve']));
            return $pdf->stream();
        }
        */

        $bilan = Bilan::find($id);
        $planning = Planning::where('bilan_id', '=', $id)->first();
        $jours = Jour::where('planning_id',$planning->id)->get();
        //return view('rapport.exportPDF', ['eleve' => $bilan->eleve, 'bilan' => $bilan, 'jours' => $jours]);
        $pdf = PDF::loadView('rapport.exportPDF', ['eleve' => $bilan->eleve, 'bilan' => $bilan, 'jours' => $jours]);
        return $pdf->stream($bilan->eleve->etablissement->full_name.' '. $bilan->periode." ".$bilan->eleve->full_name.'.pdf');
    }

}
