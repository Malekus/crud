@extends('layout.base')

@section('endStyle')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
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
                                <a href="{{ route("rapport.exportPDF") }}" target="_blank" id="btnExportPDF"
                                   class="btn btn-success mx-sm-3 mb-2">
                                    Exporter PDF
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <table id="datatable" class="table table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Sexe</th>
                                <th>Etablissement</th>
                                <th>Educateur</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($eleves as $key => $eleve)
                                <tr>
                                    <td>{{ $eleve->id }}</td>
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
@endsection

@section('jafter')
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection
