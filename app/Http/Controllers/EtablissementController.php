<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtablissementRequest;
use App\Etablissement;

class EtablissementController extends Controller
{
    public function index()
    {
        $etablissements = Etablissement::latest()->get();

        return response()->json($etablissements);
    }

    public function store(EtablissementRequest $request)
    {
        $etablissement = Etablissement::create($request->all());

        return response()->json($etablissement, 201);
    }

    public function show($id)
    {
        $etablissement = Etablissement::findOrFail($id);

        return response()->json($etablissement);
    }

    public function update(EtablissementRequest $request, $id)
    {
        $etablissement = Etablissement::findOrFail($id);
        $etablissement->update($request->all());

        return response()->json($etablissement, 200);
    }

    public function destroy($id)
    {
        Etablissement::destroy($id);

        return response()->json(null, 204);
    }
}