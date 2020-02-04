<?php

namespace App\Http\Controllers;

use App\Educateur;
use App\Eleve;
use App\Etablissement;
use App\Http\Requests\EleveRequest;
use Symfony\Component\HttpFoundation\Request;

class EleveController extends Controller
{
    public function index(Request $request)
    {
        $etablissements = Etablissement::all()->pluck('full_name', 'id');
        $educateurs = Educateur::all()->pluck('full_name', 'id');

        if($request->ajax()) {
            $eleves = Eleve::latest()->get();
            return response()->json($eleves);
        }

        if ($request->get('search') == null) {
            $eleves = Eleve::with('educateur')->with('etablissement')->latest()->paginate(10);
            return view('eleve.index', compact(['eleves', 'etablissements', 'educateurs']));
        }

        $eleves = Eleve::where('nom', 'like', '%' . $request->get('search') . '%')->paginate(10);
        return view('eleve.index', compact(['eleves', 'etablissements', 'educateurs']));
    }

    public function store(EleveRequest $request)
    {
        if($request->ajax()) {
            $eleve = Eleve::create($request->all());
            return response()->json($eleve, 201);
        }
        $eleve = $request->isMethod('put') ? Eleve::findOrFail($request->id) : new Eleve($request->except(['etablissement', 'educateur']));
        $eleve->etablissement()->associate(Etablissement::find($request->get('etablissement')));
        $eleve->educateur()->associate(Educateur::find($request->get('educateur')));
        $eleve->save();
        return redirect(route('eleve.index'));
    }

    public function show($id)
    {
        $etablissements = Etablissement::all()->pluck('full_name', 'id');
        $educateurs = Educateur::all()->pluck('full_name', 'id');
        $eleve = Eleve::findOrFail($id);
        return view('eleve.show', compact(['eleve', 'etablissements', 'educateurs']));
    }

    public function update(EleveRequest $request, $id)
    {
        if($request->ajax()) {
            $eleve = Eleve::findOrFail($id);
            $eleve->update($request->all());
            return response()->json($eleve, 200);
        }
        $eleve = Eleve::findOrFail($id);
        $eleve->update($request->except(['etablissement', 'educateur']));
        $eleve->etablissement()->associate(Etablissement::find($request->get('etablissement')));
        $eleve->educateur()->associate(Educateur::find($request->get('educateur')));
        $eleve->save();
        return redirect(route('eleve.show', $id));
    }

    public function destroy(EleveRequest $request, $id)
    {
        if($request->ajax()) {
            Eleve::destroy($id);
            return response()->json(null, 204);
        }
        Eleve::destroy($id);
        return redirect(route('eleve.index'));
    }
}
