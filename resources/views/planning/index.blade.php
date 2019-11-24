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
                                                @if(\Carbon\Carbon::now()->format('d/m/Y') == $name[0])
                                                    <span class="jour todayDay"
                                                          data-id="{{ $name[0] }}"><p>{{ $name[1] }}</p></span>
                                                @else
                                                    @if($name[1] == 'S' or $name[1] == 'D')
                                                        <span class="jour weekendDay"
                                                              data-id="{{ $name[0] }}"><p>{{ $name[1] }}</p></span>
                                                    @else
                                                        <span class="jour @if(array_key_exists($name[0], $jours)){{ $jours[$name[0]] }}@endif" data-id="{{ $name[0] }}"><p>{{ $name[1] }}</p></span>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                                <div class="no-height">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="row">
                                <div class="col-4">
                                    <p style="display: table">Bagnolet <span class="pr-2" style="background-color: #2980b9; display: table-cell; vertical-align: middle; width: 50px; height: 20px;"></span></p>
                                </div>
                                <div class="col-4">

                                    <p style="display: table">Epinay <span class="pr-2" style="background-color: #16a085; display: table-cell; vertical-align: middle; width: 50px; height: 20px;"></span></p>
                                </div>
                                <div class="col-4">
                                    <p style="display: table">Stains <span class="pr-2" style="background-color: #d35400; display: table-cell; vertical-align: middle; width: 50px; height: 20px;"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <style>



        /* background: linear-gradient(to right, #002395, #002395 33.33%, white 33.33%, white 66.66%, #ed2939 66.66%); */
        #ownCalendar {
            width: 100%;
            height: 600px;
            border: #1b1e21 1px solid;
            border-bottom: none;
            display: flex;
            font-weight: 500;
        }

        .jour {
            background-color: #f4f9fb;
            color: #17313d;
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
            background-color: #15323e;
            color: white;
        }

        .todayDay {
            color: red;
            border: 1px red solid;
        }

        /* 10262f */

        .partMonthName p, .partMonthDays p {
            margin: 0;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .partMonthName div, .partMonthDays span {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bagnolet {
            background-color: var(--bagnolet);
        }

        .epinay {
            background-color: var(--epinay);
        }

        .stains {
            background-color: var(--stains);
        }

        .bagnoletEpinay {
            background: linear-gradient(to bottom, var(--bagnolet), var(--bagnolet) 50%, var(--epinay) 50%, var(--epinay) 50%);
        }

        .bagnoletStains {
            background: linear-gradient(to bottom, var(--bagnolet), var(--bagnolet) 50%, var(--stains) 50%, var(--stains) 50%);
        }

        .epinayStains {
            background: linear-gradient(to bottom, var(--epinay), var(--epinay) 50%, var(--stains) 50%, var(--stains) 50%);
        }

        .bagnoletEpinayStains {
            background: linear-gradient(to bottom, var(--bagnolet), var(--bagnolet) 33.33%, var(--epinay) 33.33%, var(--epinay) 66.66%, var(--stains) 66.66%);
        }

    </style>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $('.partMonthDays').on('click', '.jour', function () {
                var date = $(this).attr('data-id');
                var url = '{{ url('/ajax/jour')}}';
                //url = url.replace(':date', date);

                console.log(url)
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        date: date
                    },
                    datatype: 'json',
                    success: function (data) {
                        console.log(data)
                        // $('#remplacer').fadeIn(500);
                        $('.no-height').empty();
                        $('.no-height').append(data)
                        $("#remplacer").modal()
                    },
                    error: function (data) {
                        console.log("fail");
                        console.log(data)
                    }
                });
            })
        });
    </script>
@endsection

