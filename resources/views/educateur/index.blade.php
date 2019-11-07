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
                                {!! Form::open(['method' => 'get','url' => route('educateur.index'), 'class' => 'form-inline']) !!} {{-- route('personne².index') --}}
                                <div class="form-group mb-2">
                                    {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => "Nom de l'éducateur"]) !!}
                                </div>
                                <button type="submit" class="btn btn-info mx-sm-3 mb-2">
                                    Rechercher
                                </button>
                                {!! Form::close() !!}
                            </div>

                            <div class="float-right">
                                <a href="{{route('educateur.create')}}"
                                   class="btn btn-success"> {{-- {{ route('personne.create') }} --}}
                                    <span class="fas fa-plus"></span> Ajouter un educateur
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prénom</th>
                                        <th scope="col">Dernière activité</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($educateurs as $key => $educateur)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $educateur->nom  }}</td>
                                            <td>{{ $educateur->prenom  }}</td>
                                            <td>{{ \Carbon\Carbon::parse($educateur->updated_at)->format('d/m/Y') }}</td>
                                            <td>Action</td>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    @include('layout.pagination', ['model' => $educateurs])
                </div>
            </div>
        </div>
    </div>
@endsection

