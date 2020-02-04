<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="remplacer" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Affichage élèves exclus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @foreach($jours as $key => $jourExlus)
                    <p>Ville: {{ $key }}</p>
                    <table class="table table-bordered table-hover">
                        <tr class="bg-light">
                            <th>Collège</th>
                            <th>Élève</th>
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
