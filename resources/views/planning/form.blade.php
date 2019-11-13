@isset($typeForm)
    @if($typeForm == "create")
        {!! Form::model($bilan, ['url' => route('plannings.store'), 'class' => 'needs-validation', 'novalidate']) !!}
        <div class="modal-body">

            <input name="bilan_id" type="hidden" value="{{ $bilan->id }}">
            <div class="d-none">
                <div class="form-group row justify-content-center">
                    {!! Form::label('dateDebut', 'Date de début', ['class' => 'col-lg-2 col-form-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::date('dateDebut', $bilan->dateDebut, ['class' => 'form-control', 'required']) !!}
                        <div class="invalid-feedback">
                            Saisir une date de debut
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    {!! Form::label('dateFin', 'Date de fin', ['class' => 'col-lg-2 col-form-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::date('dateFin', $bilan->dateFin, ['class' => 'form-control', 'required']) !!}
                        <div class="invalid-feedback">
                            Saisir une date de fin
                        </div>
                    </div>
                </div>
            </div>

            @for ($i = 1; $i <= \Carbon\Carbon::parse($bilan->dateFin)->diffInDays($bilan->dateDebut); $i++)
                <p class="font-weight-bold">
                    le {{ \Carbon\Carbon::parse($bilan->dateDebut)->addDays($i)->format('d/m/Y') }} : Jour {{ $i  }}</p>
                <div class="form-group row justify-content-center">
                    {!! Form::label('absent_'.$i, 'Absent', ['class' => 'col-lg-2 col-form-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::select('absent_'.$i, ['0' => 'aucune absence', '1' => 'matin', '2' => 'après-midi', '3' => 'matin et après-midi'], '0', ['class' => 'form-control']) !!}
                        <div class="invalid-feedback">
                            Saisir un nom
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    {!! Form::label('retard_'.$i, 'Retard', ['class' => 'col-lg-2 col-form-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::select('retard_'.$i, ['0' => 'aucun retard', '1' => 'matin', '2' => 'après-midi', '3' => 'matin et après-midi'], '0', ['class' => 'form-control']) !!}
                        <div class="invalid-feedback">
                            Saisir un nom
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>

        {!! Form::close() !!}
    @endif

    @if($typeForm == "edit")

    @endif

    @if($typeForm == "delete")

    @endif
@endisset




