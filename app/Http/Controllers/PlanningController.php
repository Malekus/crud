<?php

namespace App\Http\Controllers;

use App\Bilan;
use App\Http\Requests\PlanningRequest;
use App\Planning;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Symfony\Component\HttpFoundation\Request;

class PlanningController extends Controller
{
    public function index(Request $request)
    {
        if ($request->get('search') == null or $request->get('search') > 3000) {
            $carbon = Carbon::now()->format('Y');
            $period = CarbonPeriod::create($carbon.'-01-01', ($carbon+1).'-01-01');
            $dates = $this->getOnlyMonth($period->toArray());
            return view('planning.index', compact('dates'));
        }

        $period = CarbonPeriod::create($request->get('search').'-01-01', ($request->get('search')+1).'-01-01');
        $dates = $this->getOnlyMonth($period->toArray());
        return view('planning.index', compact('dates'));
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

    private function getOnlyMonth($data)
    {
        $r = [];
        foreach ($data as $date){
            if(array_key_exists($date->format('m'), $r)){
                array_push($r[$date->format('m')], $date->format('l'));
            }
            else{
                $r[$date->format('m')] = array();
                array_push($r[$date->format('m')], $date->format('l'));
            }
        }
        array_pop($r['01']);

        foreach ($r as $key => $value){
            if(sizeof($value) != 31){
                $nbX = 31 - sizeof($value);
                for($i = 0; $i < $nbX; $i++){
                    array_push($r[$key], 'X');
                }
            }
        }

        return $r;
    }

    public function destroy($id)
    {
        Planning::destroy($id);

        return response()->json(null, 204);
    }
}
