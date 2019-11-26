<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{
    public function index(Request $request)
    {
        if ($request->get('search') == null) {
            $dateNow = \Carbon\Carbon::now()->format('Y');
            return view('statistique.index', compact('dateNow'));
        }

        $dateNow = $request->get('search');
        return view('statistique.index', compact('dateNow'));
    }

    public function makeChart($date, $type = null)
    {
        if ($date == null) {$date = Carbon::now()->format('Y');}
        if (strpos($date, '/') !== false) {
            $ex = explode("/", $date);
            $date = $ex[1]."-".$ex[0];
        }

        $idGraphe = $type.'Chart';

        if($type == "sexe"){

            $breaks = "breaksSexe";

            $eleves = DB::table('eleves')
                ->select(DB::raw('count(*) as nb, sexe as label'))
                ->where('updated_at', 'like', '%' . $date . '%')
                ->groupBy('sexe')
                ->orderBy('sexe')
                ->get()
                ->toArray();

            if(empty($eleves)) return;

            $x = $this->getCategoriesValues($eleves);
            $categories = $x[0];
            $values = $x[1];

            $chart = "var ".$breaks." = new Map();\n    Highcharts.chart('" . $idGraphe . "', {
                        chart: {
                            type: 'column',
                            events: {
                            render: function() {
                              let series = this.series
                              let sum = 0
                              for(let i = 0; i < series.length; i++) {
                                if(series[i].visible){
                                  for(let j = 0; j < series[i].data.length; j++) {
                                    sum += series[i].data[j].y
                                  }
                                }
                              }
                            this.setTitle(false, {text: sum + ' exclus'}, false) 
                            }
                          }
                        },
                        title: {
                            text: 'Nombre d\'élève exclu ".strval($date)."',
                        },
                        xAxis: {
                           type: 'category',
                        },
                        yAxis: {
                            min: 0,
                            
                            title: {
                                text: ''
                            }
                        },
                        plotOptions: {
                            column: {
                                grouping: false,
                                pointPadding: 0.2,
                                borderWidth: 0,
                                events: {
                                    legendItemClick: function() {
                                        if(".$breaks.".has(this.xData[0])) {
                                        ".$breaks.".delete(this.xData[0])
                                      }
                                      else {
                                        ".$breaks.".set(this.xData[0], {from: this.xData[0] - 0.5,to: this.xData[0] + 0.5,breakSize: 0})
                                      }
                                      this.chart.xAxis[0].update({
                                        breaks: [... ".$breaks.".values()]
                                      });
                                    }
      							}
                            },
                            series: {
                                dataLabels: { enabled: true }
                            }
                        },
                        series: [{
                            name: '". $categories[0] ."',
                            data: [{name: '". $categories[0] ."', y:". $values[0] ."}],
                        }, {
                            name: '". $categories[1] ."',
                            data: [{name: '". $categories[1] ."', y:". $values[1] ."}],

                        }],
                        credits: { enabled: false },
                        tooltip: { enabled: false },
                        });";

            return view('statistique.makeChart', ['idGraphe' => $idGraphe, 'chart' => $chart]);
        }

        if($type == "ville"){

            $breaks = "breaksVille";

            $villes = DB::table('eleves')
                ->select(DB::raw('count(*) as nb, ville as label'))
                ->where('updated_at', 'like', '%' . $date . '%')
                ->groupBy('ville')
                ->orderBy('ville')
                ->get()
                ->toArray();

            if(empty($villes)) return;

            $x = $this->getCategoriesValues($villes);
            $categories = $x[0];
            $values = $x[1];

            $chart = "var ".$breaks." = new Map();\n    Highcharts.chart('" . $idGraphe . "', {
                        chart: {
                            type: 'column',
                            events: {
                            render: function() {
                              let series = this.series
                              let sum = 0
                              for(let i = 0; i < series.length; i++) {
                                if(series[i].visible){
                                  for(let j = 0; j < series[i].data.length; j++) {
                                    sum += series[i].data[j].y
                                  }
                                }
                              }
                            this.setTitle(false, {text: sum + ' exclus'}, false) 
                            }
                          }
                        },
                        title: {
                            text: 'Nombre d\'élève exclu ',
                        },
                        xAxis: {
                           type: 'category',
                        },
                        yAxis: {
                            min: 0,
                            
                            title: {
                                text: ''
                            }
                        },
                        plotOptions: {
                            column: {
                                grouping: false,
                                pointPadding: 0.2,
                                borderWidth: 0,
                                events: {
                                    legendItemClick: function() {
                                        if(".$breaks.".has(this.xData[0])) {
                                        ".$breaks.".delete(this.xData[0])
                                      }
                                      else {
                                        ".$breaks.".set(this.xData[0], {from: this.xData[0] - 0.5,to: this.xData[0] + 0.5,breakSize: 0})
                                      }
                                      this.chart.xAxis[0].update({
                                        breaks: [... ".$breaks.".values()]
                                      });
                                    }
      							}
                            },
                            series: {
                                dataLabels: { enabled: true }
                            }
                        },
                        series: [{
                            name: '". $categories[0] ."',
                            data: [{name: '". $categories[0] ."', y:". $values[0] ."}],
                        }, {
                            name: '". $categories[1] ."',
                            data: [{name: '". $categories[1] ."', y:". $values[1] ."}],
                        }
                        , {
                            name: '". $categories[2] ."',
                            data: [{name: '". $categories[2] ."', y:". $values[2] ."}],
                        }],
                        credits: { enabled: false },
                        tooltip: { enabled: false },
                        });";


            return view('statistique.makeChart', ['idGraphe' => $idGraphe, 'chart' => $chart]);
        }

        if($type == "etablissement"){

            $breaks = "breaksEtablissement";

            $etablissements = DB::table('eleves')
                ->select(DB::raw('count(*) as nb, (select nom from etablissements where id = etablissement_id) as label'))
                ->where('updated_at', 'like', '%' . $date . '%')
                ->groupBy('etablissement_id')
                ->orderBy('etablissement_id')
                ->get()
                ->toArray();

            if(empty($etablissements)) return;

            $x = $this->getCategoriesValues($etablissements);
            $categories = $x[0];
            $values = $x[1];

            $chart = "var ".$breaks." = new Map();\n    Highcharts.chart('" . $idGraphe . "', {
                        chart: {
                            type: 'column',
                            events: {
                            render: function() {
                              let series = this.series
                              let sum = 0
                              for(let i = 0; i < series.length; i++) {
                                if(series[i].visible){
                                  for(let j = 0; j < series[i].data.length; j++) {
                                    sum += series[i].data[j].y
                                  }
                                }
                              }
                            this.setTitle(false, {text: sum + ' exclus'}, false) 
                            }
                          }
                        },
                        title: {
                            text: 'Nombre d\'élève exclu ',
                        },
                        xAxis: {
                           type: 'category',
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: ''
                            }
                        },
                        plotOptions: {
                            column: {
                                grouping: false,
                                pointPadding: 0.2,
                                borderWidth: 0,
                                events: {
                                    legendItemClick: function() {
                                        if(".$breaks.".has(this.xData[0])) {
                                        ".$breaks.".delete(this.xData[0])
                                      }
                                      else {
                                        ".$breaks.".set(this.xData[0], {from: this.xData[0] - 0.5,to: this.xData[0] + 0.5,breakSize: 0})
                                      }
                                      this.chart.xAxis[0].update({
                                        breaks: [... ".$breaks.".values()]
                                      });
                                    }
      							}
                            },
                            series: {
                                dataLabels: { enabled: true }
                            }
                        },
                        series: [{
                            name: '". $categories[0] ."',
                            data: [{name: '". $categories[0] ."', y:". $values[0] ."}],
                        }, {
                            name: '". $categories[1] ."',
                            data: [{name: '". $categories[1] ."', y:". $values[1] ."}],
                        }
                        , {
                            name: '". $categories[2] ."',
                            data: [{name: '". $categories[2] ."', y:". $values[2] ."}],
                        }, {
                            name: '". $categories[3] ."',
                            data: [{name: '". $categories[3] ."', y:". $values[3] ."}],
                        }
                        , {
                            name: '". $categories[4] ."',
                            data: [{name: '". $categories[4] ."', y:". $values[4] ."}],
                        }, {
                            name: '". $categories[5] ."',
                            data: [{name: '". $categories[5] ."', y:". $values[5] ."}],
                        }
                        , {
                            name: '". $categories[6] ."',
                            data: [{name: '". $categories[6] ."', y:". $values[6] ."}],
                        }, {
                            name: '". $categories[7] ."',
                            data: [{name: '". $categories[7] ."', y:". $values[7] ."}],
                        }],
                        credits: { enabled: false },
                        tooltip: { enabled: false },
                        });";


            return view('statistique.makeChart', ['idGraphe' => $idGraphe, 'chart' => $chart]);
        }

        if($type == "classe"){

            $breaks = "breaksClasse";

            $classes = DB::table('eleves')
                ->select(DB::raw('count(*) as nb, classe as label'))
                ->where('updated_at', 'like', '%' . $date . '%')
                ->groupBy('classe')
                ->orderBy('classe')
                ->get()
                ->toArray();

            if(empty($classes)) return;

            $x = $this->getCategoriesValues($classes);
            $categories = $x[0];
            $values = $x[1];

            $chart = "var ".$breaks." = new Map();\n    Highcharts.chart('" . $idGraphe . "', {
                        chart: {
                            type: 'column',
                            events: {
                            render: function() {
                              let series = this.series
                              let sum = 0
                              for(let i = 0; i < series.length; i++) {
                                if(series[i].visible){
                                  for(let j = 0; j < series[i].data.length; j++) {
                                    sum += series[i].data[j].y
                                  }
                                }
                              }
                            this.setTitle(false, {text: sum + ' exclus'}, false) 
                            }
                          }
                        },
                        title: {
                            text: 'Nombre d\'élève exclu ',
                        },
                        xAxis: {
                           type: 'category',
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: ''
                            }
                        },
                        plotOptions: {
                            column: {
                                grouping: false,
                                pointPadding: 0.2,
                                borderWidth: 0,
                                events: {
                                    legendItemClick: function() {
                                        if(".$breaks.".has(this.xData[0])) {
                                        ".$breaks.".delete(this.xData[0])
                                      }
                                      else {
                                        ".$breaks.".set(this.xData[0], {from: this.xData[0] - 0.5,to: this.xData[0] + 0.5,breakSize: 0})
                                      }
                                      this.chart.xAxis[0].update({
                                        breaks: [... ".$breaks.".values()]
                                      });
                                    }
      							}
                            },
                            series: {
                                dataLabels: { enabled: true }
                            }
                        },
                        series: [{
                            name: '". $categories[0] ."',
                            data: [{name: '". $categories[0] ."', y:". $values[0] ."}],
                        }, {
                            name: '". $categories[1] ."',
                            data: [{name: '". $categories[1] ."', y:". $values[1] ."}],
                        }
                        , {
                            name: '". $categories[2] ."',
                            data: [{name: '". $categories[2] ."', y:". $values[2] ."}],
                        }, {
                            name: '". $categories[3] ."',
                            data: [{name: '". $categories[3] ."', y:". $values[3] ."}],
                        }],
                        credits: { enabled: false },
                        tooltip: { enabled: false },
                        });";


            return view('statistique.makeChart', ['idGraphe' => $idGraphe, 'chart' => $chart]);
        }

        return;

    }

    private function getCategoriesValues($data)
    {
        $categories = $values = [];
        foreach ($data as $key => $value) {
            array_push($values, $value->nb);
            array_push($categories, ucfirst($value->label));
        }
        return [$categories, $values];
    }
}
