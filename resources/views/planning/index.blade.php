@extends('layout.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card sizeCard">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 pb-2">
                            <h1 class="text-capitalize"><i class="fa fa-calendar-alt mr-2"></i>planning</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="float-left">
                                {!! Form::open(['method' => 'get','url' => route('planning.index'), 'class' => 'form-inline']) !!}
                                <div class="form-group mb-2">
                                    {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => "Année"]) !!}
                                </div>
                                <button type="submit" class="btn btn-info mx-sm-3 mb-2">
                                    Rechercher
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mt-2">
                            <div id="ownCalendar" class="rounded">
                                <div class="partMonthName text-capitalize">
                                    <div>Mois</div>
                                    <div>janvier</div>
                                    <div>février</div>
                                    <div>mars</div>
                                    <div>avril</div>
                                    <div>mai</div>
                                    <div>juin</div>
                                    <div>juillet</div>
                                    <div>août</div>
                                    <div>septembre</div>
                                    <div>octobre</div>
                                    <div>novembre</div>
                                    <div>décembre</div>
                                </div>
                                <div class="partMonthDays">
                                    <div>@for($i = 1; $i<= 31; $i++) <span>{{$i}}</span>@endfor</div>
                                    @foreach($dates as $key => $date)
                                        <div>@foreach($date as $name) <span>{{ $name[0] }}</span>@endforeach</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        #ownCalendar {
            width: 100%;
            height: 600px;
            border: #1b1e21 1px solid;
            border-bottom: none;
            display: flex;
        }
        .partMonthName {
            flex: 1 1;
        }

        .partMonthName div {
            height: calc(100% / 13);
            text-align: center;
            border-bottom: 1px solid black;
        }

        .partMonthDays {
            flex: 8 1;
        }

        .partMonthDays div {
            display: flex;
            flex-flow: row nowrap;
            height: calc(100% / 13);
        }
        .partMonthDays div span {
            flex: 1 0;
            text-align: center;
            border-left: 1px solid black;
            border-bottom: 1px solid black;
            align-self: stretch;
        }

        .partMonthDays div span:hover {
            background-color: #D9DEE4;
        }
    </style>
@endsection



