<?php

namespace App\Http\Controllers;

use App\Bilan;
use App\Jour;
use App\Http\Requests\PlanningRequest;
use App\Planning;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Symfony\Component\HttpFoundation\Request;
use function Psy\bin;

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
        $keys = array_keys($request->except(['_token', 'bilan_id', 'dateDebut', 'dateFin']));

        $planning = new Planning(['dateDebut'=>$request->get('dateDebut'), 'dateFin'=>$request->get('dateFin')]);
        $bilan = Bilan::find($request->get('bilan_id'));
        $planning->bilan()->associate($bilan); // = $bilan->id;
        $planning->save();

        for($i = 0; $i < Carbon::parse($bilan->dateFin)->diffInDays($bilan->dateDebut); $i++ ) {
            $r = ['dateExclu' => Carbon::parse($bilan->dateDebut)->addDays($i), 'matinAbsent' => 0, 'apremAbsent' => 0, 'apremRetard' => 0, 'matinRetard' => 0];
            foreach ($keys as $key => $value) {
                if (preg_match("/_".$i."/", $value)) {
                    $r[explode("_", $value)[0]] = 1;
                }
            }
            $jour = new Jour($r);
            $jour->planning()->associate($planning);
            $jour->save();
        }

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
        $keys = array_keys($request->except(['_token', '_method']));
        foreach ($keys as $key){
            dd($planning, $request->all(), $key, $keys); // $jour->update(['matinAbsent' => 0, 'apremAbsent' => 0, 'apremRetard' => 0, 'matinRetard' => 0])
        }



        return redirect(route('eleve.show', $planning->bilan->eleve->id));
    }

    private function getOnlyMonth($data)
    {
        $r = [];
        foreach ($data as $date){
            if(array_key_exists($date->format('m'), $r)){
                array_push($r[$date->format('m')], [$date->format('d/m/Y'), $this->daysEnToFr($date->format('l'))]);
            }
            else{
                $r[$date->format('m')] = array();
                array_push($r[$date->format('m')], [$date->format('d/m/Y'), $this->daysEnToFr($date->format('l'))]);
            }
        }
        array_pop($r['01']);

        foreach ($r as $key => $value){
            if(sizeof($value) != 31){
                $nbX = 31 - sizeof($value);
                for($i = 0; $i < $nbX; $i++){
                    array_push($r[$key], ['X', 'X']);
                }
            }
        }
        return $r;
    }

    private function daysEnToFr($days){
        switch ($days){
            case "Monday":
                return "L";
            case "Tuesday":
                return "M";
            case "Wednesday":
                return "M";
            case "Thursday":
                return "J";
            case "Friday":
                return "V";
            case "Saturday":
                return "S";
            case "Sunday":
                return "D";
        }
    }

    public function destroy($id)
    {
        $planning = Planning::find($id);
        Planning::destroy($id);
        return redirect(route('eleve.show', $planning->bilan->eleve->id));
    }
}
