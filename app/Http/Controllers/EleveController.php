<?php

namespace App\Http\Controllers;

use App\Http\Requests\EleveRequest;
use App\Eleve;

class EleveController extends Controller
{
    public function index()
    {
        $eleves = Eleve::latest()->get();

        return response()->json($eleves);
    }

    public function store(EleveRequest $request)
    {
        $eleve = Eleve::create($request->all());

        return response()->json($eleve, 201);
    }

    public function show($id)
    {
        $eleve = Eleve::findOrFail($id);

        return response()->json($eleve);
    }

    public function update(EleveRequest $request, $id)
    {
        $eleve = Eleve::findOrFail($id);
        $eleve->update($request->all());

        return response()->json($eleve, 200);
    }

    public function destroy($id)
    {
        Eleve::destroy($id);

        return response()->json(null, 204);
    }
}