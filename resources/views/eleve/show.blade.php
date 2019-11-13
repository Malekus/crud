
@extends('layout.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card sizeCard">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h1>{{ strtoupper($eleve->nom) }} {{ $eleve->prenom  }}</h1>
                        </div>
                        <div class="col-4">
                            <div class="float-right">
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle pull-right my-2" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        Ajouter une action
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <button data-toggle="modal" data-target="#editModalEleve" class="dropdown-item" href="#"><span class="icon mr-2"><i class="fa fa-edit"></i></span>Modifier l'élève</button>
                                        <button data-toggle="modal" data-target="#deleteModalEleve" class="dropdown-item" href="#"><span class="icon mr-2"><i class="fa fa-trash-alt"></i></span>Supprimer l'élève</button>
                                        <button data-toggle="modal" data-target="#addModalBilan" class="dropdown-item" href="#"><span class="icon mr-2"><i class="fa fa-file-alt"></i></span>Ajouter un bilan</button>
                                        <button data-toggle="modal" data-target="#addModalPlanning"  class="dropdown-item" href="#"><span class="icon mr-2"><i class="fa fa-calendar-alt"></i></span>Ajouter un planning</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                            <ul class="list-group">
                                <li class="list-group-item atom text-white"><h5>Informations générales</h5>
                                </li>
                                <li class="list-group-item"><span class="font-weight-bold">Age</span> : {{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->diffInYears($eleve->dateNaissance) }} ans</li>
                                <li class="list-group-item"><span class="font-weight-bold">Sexe</span> : {{ $eleve->sexe}}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Classe</span> : {{ $eleve->classe  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Ville</span> : {{ $eleve->ville  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Etablissement</span> : {{ $eleve->etablissement->full_name  }}</li>
                            </ul>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                            <ul class="list-group">
                                <li class="list-group-item atom text-white"><h5>Activité</h5>
                                </li>
                                <li class="list-group-item"><span class="font-weight-bold">Nombre de bilan</span> : {{ sizeof($eleve->bilans) }}</li>

                                <li class="list-group-item"><span class="font-weight-bold">Nombre de planning</span> : {{ sizeof($eleve->plannings) }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Dernière activité</span> : {{ \Carbon\Carbon::parse($eleve->updated_at)->format('d/m/Y')  }}</li>
                                <li class="list-group-item"><span class="font-weight-bold">Educateur</span> : {{ $eleve->educateur->nom }} {{ $eleve->educateur->prenom }}</li>
                            </ul>
                        </div>
                    </div>
                    @if(count($eleve->bilans) != 0)
                        <div class="row">
                            <div class="col-12">
                                <h2>Bilans</h2>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date de début</th>
                                        <th>Date de fin</th>
                                        <th>Nombre de jour exclus</th>
                                        <th>Rapport</th>
                                        <th>Dernière modification</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($eleve->bilans as $key => $bilan)
                                        <tr id="{{ $bilan->id  }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ \Carbon\Carbon::parse($bilan->dateDebut)->format('d/m/Y') }}</td>
                                            @if($bilan->dateDebut > $bilan->dateFin)
                                                <td class="alert alert-danger">{{ \Carbon\Carbon::parse($bilan->dateFin)->format('d/m/Y') }}</td>
                                            @else
                                                <td>{{ \Carbon\Carbon::parse($bilan->dateFin)->format('d/m/Y') }}</td>
                                            @endif

                                            <td>{{ \Carbon\Carbon::parse($bilan->dateFin)->diffInDays($bilan->dateDebut) }} jours</td>
                                            <td>{{ \Illuminate\Support\Str::limit($bilan->rapport, $limit = 50, $end = ' [...]') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($bilan->updated_at)->format('d/m/Y')  }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-success" data-toggle="modal" data-target="#showModal{{ $bilan->id }}">
                                                    <span class="icon"><i class="fas fa-search"></i></span>
                                                </button>
                                                @if(!isset($bilan->planning))
                                                    <button class="btn btn-dark" data-toggle="modal" data-target="#addModalPlanning{{ $bilan->id }}">
                                                        <span class="icon"><i class="fa fa-plus"></i></span>
                                                    </button>
                                                @endif
                                                <button class="btn btn-info" data-toggle="modal" data-target="#editModal{{ $bilan->id }}">
                                                    <span class="icon"><i class="fas fa-edit"></i></span>
                                                </button>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $bilan->id }}">
                                                    <span class="icon"><i class="fas fa-trash-alt"></i></span>
                                                </button>
                                            </td>
                                        </tr>
                                        <div class="no-height">
                                            <div class="modal fade" tabindex="-1" role="dialog" id="showModal{{ $bilan->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5><i class="fa fa-file-alt mr-3"></i>Bilan de {{ $eleve->nom }} {{ $eleve->prenom }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        @include('bilan.form', ['typeForm'=>"show", 'model' => $bilan])
                                                    </div>
                                                </div>
                                            </div>
                                            @if(!isset($bilan->planning))
                                                <div class="modal fade" tabindex="-1" role="dialog" id="addModalPlanning{{ $bilan->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5><i class="fa fa-file-alt mr-3"></i>Ajouter un planning</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            @include('planning.form', ['typeForm'=>"create", 'bilan' => $bilan, "eleve"=>$eleve])
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="modal fade" tabindex="-1" role="dialog" id="editModal{{ $bilan->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5><i class="fa fa-file-alt mr-3"></i>Modifier le bilan
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        @include('bilan.form', ['typeForm'=>"edit", 'model' => $bilan, "eleve"=>$eleve])
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal{{ $bilan->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5><i class="fa fa-file-alt mr-3"></i>Supprimer le bilan
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        @include('bilan.form', ['typeForm'=>"delete", 'model' => $bilan, "eleve"=>$eleve])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                    @if((count($eleve->plannings) != 0))
                        <div class="row">
                            <div class="col-12">
                                <h2>Plannings</h2>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre de jour exclus</th>
                                        <th>Nombre de retard</th>
                                        <th>nombre d'absence</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($eleve->plannings as $key => $planning)
                                        <tr id="{{ $planning->id  }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ \Carbon\Carbon::parse($bilan->dateFin)->diffInDays($bilan->dateDebut) }} jours</td>
                                            <td>5 retards</td>
                                            <td>0 absence</td>
                                            <td class="text-center">
                                                <button class="btn btn-success" data-toggle="modal" data-target="">
                                                    <span class="icon"><i class="fas fa-search"></i></span>
                                                </button>
                                                <button class="btn btn-info" data-toggle="modal" data-target="">
                                                    <span class="icon"><i class="fas fa-edit"></i></span>
                                                </button>
                                            </td>
                                        </tr>
                                        <div class="no-height">

                                        </div>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('noHeight')
    <div class="modal fade" tabindex="-1" role="dialog" id="editModalEleve" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5><i class="fas fa-users mr-3"></i>Modifier un élève
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @include('eleve.form', ['typeForm'=>"edit", 'model' => $eleve])
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModalEleve" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5><i class="fas fa-users mr-3"></i>Supprimer l'élève
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @include('eleve.form', ['typeForm'=>"delete", 'model' => $eleve])
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="addModalBilan" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5><i class="fa fa-file-alt mr-3"></i>Ajouter un bilan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @include('bilan.form', ['typeForm' => 'create' , "eleve" =>$eleve])
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="addModalPlanning" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5><i class="fa fa-calendar-alt mr-3"></i>Ajouter un planning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- @include('eleve.form', ['typeForm' => 'create'])--}}
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
</script>
@endsection


{{--

                                            --}}
