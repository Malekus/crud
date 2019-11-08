<?php

namespace App\Http\Controllers;

use App\Etablissement;
use App\Http\Requests\EleveRequest;
use App\Eleve;
use Symfony\Component\HttpFoundation\Request;

class EleveController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $eleves = Eleve::latest()->get();
            return response()->json($eleves);
        }

        if ($request->get('search') == null) {
            $eleves = Eleve::latest()->paginate(10);
            return view('eleve.index', compact('eleves'));
        }

        $eleves = Eleve::where('nom', 'like', '%' . $request->get('search') . '%')->paginate(10);
        return view('eleve.index', compact('eleves'));
    }

    public function store(EleveRequest $request)
    {
        if($request->ajax()) {
            $eleve = Eleve::create($request->all());
            return response()->json($eleve, 201);
        }
        $eleve = $request->isMethod('put') ? Eleve::findOrFail($request->id) : new Eleve($request->except('etablissement'));
        $eleve->etablissement()->associate(Etablissement::find($request->get('etablissement')));
        $eleve->save();
        return redirect(route('eleve.index'));
    }

    public function show($id)
    {
        $eleve = Eleve::findOrFail($id);
        return response()->json($eleve);
    }

    public function update(EleveRequest $request, $id)
    {
        if($request->ajax()) {
            $eleve = Eleve::findOrFail($id);
            $eleve->update($request->all());
            return response()->json($eleve, 200);
        }
        $eleve = Eleve::findOrFail($id);
        $eleve->update($request->except('etablissement'));
        return redirect(route('eleve.index'));
    }

    public function destroy($id)
    {
        Eleve::destroy($id);
        return response()->json(null, 204);
    }
}