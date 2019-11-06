<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducateurRequest;
use App\Educateur;

class EducateurController extends Controller
{
    public function index()
    {
        $educateurs = Educateur::latest()->get();

        return response()->json($educateurs);
    }

    public function store(EducateurRequest $request)
    {
        $educateur = Educateur::create($request->all());

        return response()->json($educateur, 201);
    }

    public function show($id)
    {
        $educateur = Educateur::findOrFail($id);

        return response()->json($educateur);
    }

    public function update(EducateurRequest $request, $id)
    {
        $educateur = Educateur::findOrFail($id);
        $educateur->update($request->all());

        return response()->json($educateur, 200);
    }

    public function destroy($id)
    {
        Educateur::destroy($id);

        return response()->json(null, 204);
    }
}