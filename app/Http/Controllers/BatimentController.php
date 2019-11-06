<?php

namespace App\Http\Controllers;

use App\Http\Requests\BatimentRequest;
use App\Batiment;

class BatimentController extends Controller
{
    public function index()
    {
        $batiments = Batiment::latest()->get();

        return response()->json($batiments);
    }

    public function store(BatimentRequest $request)
    {
        $batiment = Batiment::create($request->all());

        return response()->json($batiment, 201);
    }

    public function show($id)
    {
        $batiment = Batiment::findOrFail($id);

        return response()->json($batiment);
    }

    public function update(BatimentRequest $request, $id)
    {
        $batiment = Batiment::findOrFail($id);
        $batiment->update($request->all());

        return response()->json($batiment, 200);
    }

    public function destroy($id)
    {
        Batiment::destroy($id);

        return response()->json(null, 204);
    }
}