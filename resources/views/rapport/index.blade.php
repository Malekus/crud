@extends('layout.base')

@section('endStyle')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">
    <!--
    <link rel="stylesheet" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css"/>
    -->
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">

    <style>
        table.dataTable tr th.select-checkbox.selected::after {
            content: "✔";
            margin-top: -11px;
            margin-left: -4px;
            text-align: center;
            text-shadow: rgb(176, 190, 217) 1px 1px, rgb(176, 190, 217) -1px -1px, rgb(176, 190, 217) 1px -1px, rgb(176, 190, 217) -1px 1px;
        }
    </style>

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
                        <table id="datatable" class="table table-bordered display" style="width:100%">
                            <thead>
                            <tr>
                                <th class="select-checkbox"><input id="checkBox" type="checkbox"></th>
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
                                    <td></td>
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
@endsection

@section('javascript')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
    <!--
    <script src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js"></script>
    -->
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
@endsection

@section('jafter')
    <script>
        $(document).ready(function () {
            var table = $('#datatable').DataTable({
                processing: true,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
                },
                dom: "<'row'<'col-sm-12 col-md-6'<'d-inline-block'l><'d-inline-block ml-3'B>><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: {
                    buttons: [
                        {
                            text: '<i class="fas fa-download"></i> Exporter',
                            attr : {id: "btnExport"},
                            action: function (e, dt, node, config) {
                                var count = table.rows({selected: true}).count();
                                //var rows_selected = table.column(0).checkboxes.selected();
                                console.log(count, table.rows('.selected').data().length)
                            }
                        }
                    ],
                    dom: {
                        button: {
                            tag: "button",
                            className: "btn btn-success"
                        }
                    }
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                    /*checkboxes: {
                     selectRow: true
                     }*/
                }],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                },
                order: [[1, 'asc']]
                //scrollY: '65vh'
                //scrollCollapse : true,
            });
            $('#checkBox').on('click', function() {
                if ($('#checkBox').is(':checked')) {
                    table.rows().select();
                }
                else {
                    table.rows().deselect();
                }
            });
        });
    </script>
@endsection