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
                                <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modalAddEducateur">
                                    <span class="fas fa-plus"></span> Ajouter un educateur
                                </button>
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
                                                <button type="button" class="btn btn-success">
                                                    <span class="icon"><i class="fas fa-search"></i></span>
                                                </button>
                                                <button type="button" class="btn btn-info">
                                                    <span class="icon"><i class="fas fa-edit"></i></span>
                                                </button>
                                                <button type="button" class="btn btn-danger deleteModal" data-toggle="modal">
                                                    <span class="icon"><i class="fas fa-trash-alt"></i></span>
                                                </button>
                                            </td>
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
                    <div class="modal-body">
                        <form class="needs-validation" novalidate="">
                            <div class="form-group row justify-content-center">
                                <label for="nom" class="col-lg-2 col-form-label">Nom</label>
                                <div class="col-lg-6">
                                    <input class="form-control" required name="nom" type="text" id="nom">
                                    <div class="invalid-feedback">
                                        Saisir un nom
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <label for="prenom" class="col-lg-2 col-form-label">Prénom</label>
                                <div class="col-lg-6">
                                    <input class="form-control" required name="prenom" type="text" id="prenom">
                                    <div class="invalid-feedback">
                                        Saisir un prénom
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary" id="addEducateur">Ajouter</button>
                    </div>
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

