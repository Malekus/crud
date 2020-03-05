<?php

namespace App\Http\Controllers;

use App\Educateur;
use App\Eleve;
use App\Etablissement;
use PDF;

class RapportController extends Controller
{
    public function index()
    {
        $etablissements = Etablissement::all()->pluck('full_name', 'id');
        $educateurs = Educateur::all()->pluck('full_name', 'id');
        $eleves = Eleve::all()->take(15);
        return view('rapport.index', compact(['eleves', 'etablissements', 'educateurs']));
    }

    public function exportPDF()
    {
        $eleve = Eleve::find(1);
        
        return view('rapport.exportPDF', compact(['eleve']));
        $pdf = PDF::loadView('rapport.exportPDF', compact(['eleve']));
        return $pdf->stream();
    }
}
