@extends('layout.base')

@section('content')
    <div class="row">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        @foreach($jours as $key => $jourExlus)
                            <p>Ville: {{ $key }}</p>
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Collège</th>
                                    <th>Eleve</th>
                                    <th>Action</th>
                                </tr>
                            @foreach($jourExlus as $jour)
                                <tr>
                                    <td>{{ $jour->etablissement }}</td>
                                    <td>{{ $jour->nom_prenom }}</td>
                                    <td>{{ \Carbon\Carbon::parse($jour->dateExclu)->format('d-m-Y') }}</td>
                                </tr>
                            @endforeach
                            </table>
                        @endforeach

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--
                        @foreach($jours as $jour)
                            {{ $loop->index }}
                            @if($loop->index === 0)
                                <p>Je suis le premier</p>
                                <p>Ville : {{ $jour->ville }}</p>
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>Collège</th>
                                        <th>Eleve</th>
                                        <th>Date exclu</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $jour->etablissement }}</td>
                                        <td>{{ $jour->nom_prenom }}</td>
                                        <td>{{ \Carbon\Carbon::parse($jour->dateExclu)->format('d-m-Y') }}</td>
                                    </tr>
                            @else
                                <p>Premier else</p>
                                @if($jours[$loop->index]->ville == $jours[($loop->index-1)]->ville)
                                    <tr>
                                        <td>{{ $jour->etablissement }}</td>
                                        <td>{{ $jour->nom_prenom }}</td>
                                        <td>{{ \Carbon\Carbon::parse($jour->dateExclu)->format('d-m-Y') }}</td>
                                    </tr>
                                @else
                                    </table>
                                    <p>Ville : {{ $jour->ville }}</p>
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <th>Collège</th>
                                            <th>Eleve</th>
                                            <th>Date exclu</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $jour->etablissement }}</td>
                                            <td>{{ $jour->nom_prenom }}</td>
                                            <td>{{ \Carbon\Carbon::parse($jour->dateExclu)->format('d-m-Y') }}</td>
                                        </tr>
                                @endif
                            @endif
                        @endforeach
                        </table>
--}}
