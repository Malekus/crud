<?php

namespace App\Http\Controllers;

use App\Http\Requests\JourRequest;
use App\Jour;

class JourController extends Controller
{
    public function index()
    {
        $jours = Jour::latest()->get();
        return response()->json($jours);
    }

    public function store(JourRequest $request)
    {
        $jour = Jour::create($request->all());
        return response()->json($jour, 201);
    }

    public function show($id)
    {
        $jour = Jour::findOrFail($id);
        return response()->json($jour);
    }

    public function update(JourRequest $request, $id)
    {
        $jour = Jour::findOrFail($id);
        $jour->update($request->all());
        return response()->json($jour, 200);
    }

    public function destroy($id)
    {
        Jour::destroy($id);
        return response()->json(null, 204);
    }
}
