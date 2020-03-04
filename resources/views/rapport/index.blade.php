@extends('layout.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card sizeCard">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 pb-2">
                            <h1 class="text-capitalize"><i class="fas fa-file mr-2"></i>rapport</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="float-left">
                                {!! Form::open(['method' => 'get','url' => route('eleve.index'), 'class' => 'form-inline']) !!}
                                <div class="form-group mb-2">
                                    {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => "Nom de l'élève"]) !!}
                                </div>
                                <button type="submit" class="btn btn-info mx-sm-3 mb-2">
                                    Rechercher
                                </button>
                                {!! Form::close() !!}
                            </div>
                            <div class="float-left">
                                <a href="{{ route("rapport.exportPDF") }}" target="_blank" id="btnExportPDF" class="btn btn-success mx-sm-3 mb-2">
                                    Exporter PDF
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
                                    @foreach($eleves as $key => $eleve)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $eleve->nom  }}</td>
                                            <td>{{ $eleve->prenom  }}</td>
                                            <td>{{ \Carbon\Carbon::parse($eleve->updated_at)->format('d/m/Y') }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-success" href="{{ route('eleve.show', $eleve) }}">
                                                    <span class="icon"><i class="fas fa-search"></i></span>
                                                </a>
                                                <button type="button" class="btn btn-info" data-toggle="modal"
                                                        data-target="#editModal{{ $eleve->id }}">
                                                    <span class="icon"><i class="fas fa-edit"></i></span>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteModal{{ $eleve->id }}">
                                                    <span class="icon"><i class="fas fa-trash-alt"></i></span>
                                                </button>
                                            </td>
                                            <div class="no-height">
                                                <div class="modal fade" tabindex="-1" role="dialog"
                                                     id="editModal{{ $eleve->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5><i class="fas fa-users mr-3"></i>Modifier un
                                                                    élève
                                                                </h5>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            @include('eleve.form', ['typeForm'=>"edit", 'model' => $eleve])
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" tabindex="-1" role="dialog"
                                                     id="deleteModal{{ $eleve->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5><i class="fas fa-users mr-3"></i>Supprimer
                                                                    l'élève
                                                                </h5>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            @include('eleve.form', ['typeForm'=>"delete", 'model' => $eleve])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@section('javascript')
    <script>
        $('#btnExportPDF').click(function (e) {
            e.preventDefault();
            console.log("tpotpo")
        })
    </script>
@endsection

