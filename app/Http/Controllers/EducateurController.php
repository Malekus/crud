<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducateurRequest;
use App\Educateur;
use Illuminate\Http\Request;

class EducateurController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $educateurs = Educateur::latest()->get();
            return response()->json($educateurs);
        }

        return view('educateur.index');

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
