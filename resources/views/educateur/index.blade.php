@extends('layout.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card sizeCard">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 pb-2">
                            <h1><i class="fas fa-users mr-2"></i>Educateur</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="float-left">
                                {!! Form::open(['method' => 'get','url' => route('educataeur.index'), 'class' => 'form-inline']) !!} {{-- route('personne.index') --}}
                                    <div class="form-group mb-2">
                                        {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => "Nom de l'éducateur"]) !!}
                                    </div>
                                    <button type="submit" class="btn btn-info mx-sm-3 mb-2">
                                        Rechercher
                                    </button>
                                {!! Form::close() !!}
                            </div>

                            <div class="float-right">
                                <a href="#" class="btn btn-success"> {{-- {{ route('personne.create') }} --}}
                                    <span class="fas fa-plus"></span> Ajouter une personne
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
