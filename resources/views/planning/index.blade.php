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
                                    <div><p>Mois</p></div>
                                    <div><p>janvier</p></div>
                                    <div><p>février</p></div>
                                    <div><p>mars</p></div>
                                    <div><p>avril</p></div>
                                    <div><p>mai</p></div>
                                    <div><p>juin</p></div>
                                    <div><p>juillet</p></div>
                                    <div><p>août</p></div>
                                    <div><p>septembre</p></div>
                                    <div><p>octobre</p></div>
                                    <div><p>novembre</p></div>
                                    <div><p>décembre</p></div>
                                </div>
                                <div class="partMonthDays">
                                    <div>@for($i = 1; $i<= 31; $i++) <span><p>{{$i}}</p></span>@endfor</div>
                                    @foreach($dates as $date)
                                        <div>
                                            @foreach($date as $key => $name)
                                                @if($name[1] == 'S' or $name[1] == 'D')
                                                    <span class="jour weekendDay" data-id="{{ $name[0] }}"><p>{{ $name[1] }}</p></span>
                                                @else
                                                    <span class="jour" data-id="{{ $name[0] }}"><p>{{ $name[1] }}</p></span>
                                                @endif
                                            @endforeach
                                        </div>
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

        .weekendDay {
            background-color: #D9DEE4;
            color: white;
        }

        .todayDay {
            color: red;
            border: 1px red solid;
        }

        .partMonthName p, .partMonthDays p {
            margin: 0;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .partMonthName div, .partMonthDays span{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
    </style>
@endsection

@section('javascript')
<script>
    $(document).ready(function(){
       $('.partMonthDays').on('click', '.jour', function(){
           console.log($(this).attr('data-id'))
       })
    });
</script>
@endsection

