@extends('layout.base')

@section('endStyle')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">
@endsection

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
                    {{--
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
                                <a href="{{ route("rapport.exportPDF", 2) }}" target="_blank" id="btnExportPDF"
                                   class="btn btn-success mx-sm-3 mb-2">
                                    Exporter PDF
                                </a>
                            </div>
                        </div>
                    </div>
                    --}}
                    <div>
                        <table id="datatable" class="table table-bordered display" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Sexe</th>
                                <th>Etablissement</th>
                                <th>Educateur</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($eleves as $key => $eleve)
                                <tr>
                                    <td>{{ $eleve->id }}</td>
                                    <td>{{ $eleve->nom }}</td>
                                    <td>{{ $eleve->prenom }}</td>
                                    <td>{{ $eleve->sexe }}</td>
                                    <td>{{ $eleve->etablissement->full_name }}</td>
                                    <td>{{ $eleve->educateur->full_name }}</td>
                                </tr>
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
@endsection

@section('javascript')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
@endsection

@section('jafter')
    <script>
        $(document).ready(function () {
            var table = $('#datatable').DataTable({
  /*
                language : {
                    "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                    "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                    "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
                    "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
                    "sInfoPostFix":    "",
                    "sInfoThousands":  ",",
                    "sLengthMenu":     "Afficher _MENU_ éléments",
                    "sLoadingRecords": "Chargement...",
                    "sProcessing":     "Traitement...",
                    "sSearch":         "Rechercher :",
                    "sZeroRecords":    "Aucun élément correspondant trouvé",
                    "oPaginate": {
                        "sFirst":    "Premier",
                        "sLast":     "Dernier",
                        "sNext":     "Suivant",
                        "sPrevious": "Précédent"
                    },
                    "oAria": {
                        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                        "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                    },
                    "select": {
                        "rows": {
                            "_": "%d lignes sélectionnées",
                            "0": "Aucune ligne sélectionnée",
                            "1": "1 ligne sélectionnée"
                        }
                    }
                },
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'pdf'
                ]
*/              dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [
                    'copy', 'excel', 'pdf'
                ]
            });
        });
    </script>
@endsection
