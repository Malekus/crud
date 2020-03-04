@isset($typeForm)
    @if($typeForm == "create")
        {!! Form::open(['url' => route('bilans.store'), 'class' => 'needs-validation', 'novalidate']) !!}
        <div class="modal-body">
            <input name="eleve_id" type="hidden" value="{{ $eleve->id }}">
            <div class="form-group row justify-content-center">
                {!! Form::label('dateDebut', 'Date de début', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::date('dateDebut', \Carbon\Carbon::now(), ['class' => 'form-control', 'required']) !!}
                    <div class="invalid-feedback">
                        Saisir une date de debut
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                {!! Form::label('dateFin', 'Date de fin', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::date('dateFin', \Carbon\Carbon::now()->addDays(5), ['class' => 'form-control', 'required']) !!}
                    <div class="invalid-feedback">
                        Saisir une date de fin
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                {!! Form::label('rapport', 'Rapport', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    <textarea class="form-control" minlength="10" required name="rapport" id="rapport" rows="10" cols="50" style="resize: none;"></textarea>
                    <div class="invalid-feedback">
                        Saisir un rapport
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                {!! Form::label('evaluation', 'Évaluation de l\'élève', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    <textarea class="form-control" minlength="10" name="evaluation" id="evaluation" rows="10" cols="50" style="resize: none;"></textarea>
                    <div class="invalid-feedback">
                        Saisir un évaluation
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
        {!! Form::close() !!}
    @endif

    @if($typeForm == "edit")
        {!! Form::model($model, ['method'=>"PUT", 'url' => route('bilans.update', $model), 'class' => 'needs-validation', 'novalidate']) !!}
        <div class="modal-body">
            <input name="eleve_id" type="hidden" value="{{ $eleve->id }}">
            <div class="form-group row justify-content-center">
                {!! Form::label('dateDebut', 'Date de début', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::date('dateDebut', $model->dateDebut, ['class' => 'form-control', 'required', 'id' => 'dateDebut'.$model->id]) !!}
                    <div class="invalid-feedback">
                        Saisir une date de debut
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                {!! Form::label('dateFin', 'Date de fin', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::date('dateFin', $model->dateFin, ['class' => 'form-control', 'required', 'id' => 'dateFin'.$model->id]) !!}
                    <div class="invalid-feedback">
                        Saisir une date de fin
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                {!! Form::label('rapport', 'Rapport', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    <textarea class="form-control" minlength="10" required name="rapport" id="{{ 'rapport_'.$model->id }}" rows="10" cols="50" style="resize: none;">{{ $model->rapport }}</textarea>
                    <div class="invalid-feedback">
                        Saisir un rapport
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                {!! Form::label('evaluation', 'Évaluation de l\'élève', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    <textarea class="form-control" minlength="10" name="evaluation" id="{{ 'evaluation_'.$model->id }}" rows="10" cols="50" style="resize: none;">{{ $model->evaluation }}</textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-success">Modifier</button>
        </div>
        {!! Form::close() !!}
    @endif

    @if($typeForm == "delete")
        {!! Form::open(['url' => route('bilans.destroy', $model), "method" => "delete"]) !!}
        <div class="modal-body">
            <p class="text-center">Voulez vous supprimer le bilan ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </div>
        {!! Form::close() !!}
    @endif

    @if($typeForm == "show")
        <div class="modal-body">
            <p>
                Période du {{ \Carbon\Carbon::parse($bilan->dateDebut)->format('d/m/Y') }} au {{ \Carbon\Carbon::parse($bilan->dateFin)->format('d/m/Y') }}
            </p>
            <p class="font-weight-bold">Bilan de l'éducateur</p>
            <p>
                {{ $bilan->rapport }}
            </p>
            <p class="font-weight-bold">Évaluation de l'élève</p>
            <p>
                {{ $bilan->evaluation }}
            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
    @endif
@endisset

<style>
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {

        padding: 5px !important; // currently 8px
    }
</style>
