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
                                {!! Form::open(['method' => 'get','url' => route('educateur.index'), 'class' => 'form-inline']) !!}
                                <div class="form-group mb-2">
                                    {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => "Nom de l'éducateur"]) !!}
                                </div>
                                <button type="submit" class="btn btn-info mx-sm-3 mb-2">
                                    Rechercher
                                </button>
                                {!! Form::close() !!}
                            </div>

                            <div class="float-right">
                                <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modalAddEducateur"><span class="fas fa-plus mr-2"></span>Ajouter un éducateur</button>
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
                                            <td class="text-center">

                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal{{ $educateur->id }}">
                                                    <span class="icon"><i class="fas fa-edit"></i></span>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $educateur->id }}">
                                                    <span class="icon"><i class="fas fa-trash-alt"></i></span>
                                                </button>
                                            </td>
                                            <div class="no-height">
                                                <div class="modal fade" tabindex="-1" role="dialog" id="editModal{{ $educateur->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5><i class="fas fa-users mr-3"></i>Modifier un educateur</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            {!! Form::model($educateur, ['method'=>"PUT", 'url' => route('educateurs.update', $educateur), 'class' => 'needs-validation', 'novalidate']) !!}
                                                            <div class="modal-body">
                                                                <div class="form-group row justify-content-center">
                                                                    {!! Form::label('nom', 'Nom', ['class' => 'col-lg-2 col-form-label']) !!}
                                                                    <div class="col-lg-6">
                                                                        {!! Form::text('nom', null, ['class' => 'form-control', 'required']) !!}
                                                                        <div class="invalid-feedback">
                                                                            Saisir un nom
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row justify-content-center">
                                                                    {!! Form::label('prenom', 'Prénom', ['class' => 'col-lg-2 col-form-label']) !!}
                                                                    <div class="col-lg-6">
                                                                        {!! Form::text('prenom', null, ['class' => 'form-control', 'required']) !!}
                                                                        <div class="invalid-feedback">
                                                                            Saisir un nom
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                <button type="submit" class="btn btn-success">Éditer</button>
                                                            </div>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal{{ $educateur->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5><i class="fas fa-users mr-3"></i>Supprimer un éducateur</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            {!! Form::open(['url' => route('educateurs.destroy', $educateur), 'method'=>"delete"]) !!}
                                                            <div class="modal-body">
                                                                <p class="text-center">Voulez vous supprimer l'éducateur {{ $educateur->nom }} {{ $educateur->prenom }} ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                                            </div>
                                                            {!! Form::close() !!}
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
                    @include('layout.pagination', ['model' => $educateurs])
                </div>
            </div>
        </div>
    </div>

    <div class="no-height">
        <div class="modal fade" tabindex="-1" role="dialog" id="modalAddEducateur" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5><i class="fas fa-users mr-3"></i>Ajouter un educateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['url' => route('educateurs.store'), 'class' => 'needs-validation', 'novalidate']) !!}
                        <div class="modal-body">
                            <div class="form-group row justify-content-center">
                                {!! Form::label('nom', 'Nom', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('nom', null, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                {!! Form::label('prenom', 'Prénom', ['class' => 'col-lg-2 col-form-label']) !!}
                                <div class="col-lg-6">
                                    {!! Form::text('prenom', null, ['class' => 'form-control', 'required']) !!}
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $('body').on('click', '#addEducateur', function () {
            $('#addEducateur').parent().parent().children().eq(1).children().submit()
        })
    })
</script>
@endsection

