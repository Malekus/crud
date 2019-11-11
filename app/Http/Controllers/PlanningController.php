<?php

namespace App\Http\Controllers;

use App\Bilan;
use App\Http\Requests\PlanningRequest;
use App\Planning;

class PlanningController extends Controller
{
    public function index()
    {
        $plannings = Planning::latest()->get();

        return response()->json($plannings);
    }

    public function store(PlanningRequest $request)
    {
        if ($request->ajax()) {
            $planning = Planning::create($request->all());
            return response()->json($planning, 201);
        }
        $planning = $request->isMethod('put') ? Planning::findOrFail($request->id) : new Planning($request->except('bilan_id'));
        $bilan = Bilan::find($request->get('bilan_id'));
        $planning->bilan()->associate($bilan);
        $planning->save();
        return redirect(route('eleve.show', $bilan->eleve->id));

    }

    public function show($id)
    {
        $planning = Planning::findOrFail($id);

        return response()->json($planning);
    }

    public function update(PlanningRequest $request, $id)
    {
        $planning = Planning::findOrFail($id);
        $planning->update($request->all());

        return response()->json($planning, 200);
    }

    public function destroy($id)
    {
        Planning::destroy($id);

        return response()->json(null, 204);
    }
}
