<?php

namespace App\Http\Controllers;

use App\Bilan;
use App\Eleve;
use App\Planning;
use App\Http\Requests\BilanRequest;
use App\Jour;
use Carbon\Carbon;

class BilanController extends Controller
{
    public function index()
    {
        $bilans = Bilan::latest()->get();

        return response()->json($bilans);
    }

    public function store(BilanRequest $request)
    {
        if($request->ajax()) {
            $bilan = Bilan::create($request->all());
            return response()->json($bilan, 201);
        }
        $bilan = $request->isMethod('put') ? Bilan::findOrFail($request->id) : new Bilan($request->except('eleve_id'));
        $bilan->eleve()->associate(Eleve::find($request->get('eleve_id')));
        $bilan->save();
        return redirect(route('eleve.show', $request->get('eleve_id')));
    }

    public function show($id)
    {
        $bilan = Bilan::findOrFail($id);
        return response()->json($bilan);
    }

    public function update(BilanRequest $request, $id)
    {
        if($request->ajax()) {
            $bilan = Bilan::findOrFail($id);
            $bilan->update($request->all());
            return response()->json($bilan, 200);
        }
        $bilan = Bilan::findOrFail($id);
        $bilan->update($request->except('eleve_id'));
        $bilan->planning()->delete();
        $planning = new Planning(['dateDebut'=>$bilan->dateDebut, 'dateFin'=>$bilan->dateFin]);
        $planning->bilan()->associate($bilan); // = $bilan->id;
        $planning->save();

        for($i = 0; $i < Carbon::parse($bilan->dateFin)->diffInDays($bilan->dateDebut); $i++ ) {
            $r = ['dateExclu' => Carbon::parse($bilan->dateDebut)->addDays($i), 'matinAbsent' => 0, 'apremAbsent' => 0, 'apremRetard' => 0, 'matinRetard' => 0];
            $jour = new Jour($r);
            $jour->planning()->associate($planning);
            $jour->save();
        }
        return redirect(route('eleve.show', $request->get('eleve_id')));
    }

    public function destroy(BilanRequest $request, $id)
    {
        if($request->ajax()) {
            Bilan::destroy($id);
            return response()->json(null, 204);
        }
        $idEleve = Bilan::find($id);
        Bilan::destroy($id);
        return redirect(route('eleve.show', $idEleve->eleve->id));
    }
}
