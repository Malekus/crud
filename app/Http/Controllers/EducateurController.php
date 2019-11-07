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

        $educateurs = Educateur::latest()->paginate(10);
        return view('educateur.index', compact('educateurs'));

    }

    public function create() {
        return view('educateur.create');
    }

    public function store(EducateurRequest $request)
    {
        if($request->ajax()) {
            $educateur = Educateur::create($request->all());
            return response()->json($educateur, 201);
        }

        $educateur = $request->isMethod('put') ? Educateur::findOrFail($request->id) : new Educateur($request->all());
        $educateur->save();
        return redirect(route('educateur.show', compact('educateur')));

    }

    public function show(EducateurRequest $request, $id)
    {
        if($request->ajax()) {
            $educateur = Educateur::findOrFail($id);
            return response()->json($educateur);
        }


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
