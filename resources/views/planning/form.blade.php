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

            @for ($i = 0; $i < \Carbon\Carbon::parse($bilan->dateFin)->diffInDays($bilan->dateDebut); $i++)
                <p class="font-weight-bold">
                    le {{ \Carbon\Carbon::parse($bilan->dateDebut)->addDays($i)->format('d/m/Y') }} : Jour {{ $i + 1  }}
                </p>
                <div class="form-group row justify-content-center">
                    {!! Form::label('retard_'.$i, 'Retard', ['class' => 'col-lg-2 col-form-label']) !!}
                    <div class="col-lg-6">
                        <div class="form-check form-check-inline" style="height: 100%">
                            <input class="form-check-input" type="checkbox" name="{{'matinRetard_'.$i}}" value="1">
                            <label class="form-check-label" for="{{'matinRetard_'.$i}}">matin</label>
                        </div>
                        <div class="form-check form-check-inline" style="height: 100%">
                            <input class="form-check-input" type="checkbox" name="{{'apremRetard_'.$i}}" value="1">
                            <label class="form-check-label" for="{{'apremRetard_'.$i}}">après-midi</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    {!! Form::label('absent_'.$i, 'Absent', ['class' => 'col-lg-2 col-form-label']) !!}
                    <div class="col-lg-6">
                        <div class="form-check form-check-inline" style="height: 100%">
                            <input class="form-check-input" type="checkbox" name="{{'matinAbsent_'.$i}}" value="1">
                            <label class="form-check-label" for="{{'matinAbsent_'.$i}}">matin</label>
                        </div>
                        <div class="form-check form-check-inline" style="height: 100%">
                            <input class="form-check-input" type="checkbox" name="{{'apremAbsent_'.$i}}" value="1">
                            <label class="form-check-label" for="{{'apremAbsent_'.$i}}">après-midi</label>
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

    @if($typeForm == "show")
        <div class="modal-body">
            @foreach($model->jours as $key => $jour)
                <p class="font-weight-bold">
                    le {{ \Carbon\Carbon::parse($jour->dateExclu)->format('d/m/Y') }} : Jour {{ $key + 1  }}
                </p>
                <p>
                @if($jour->matinAbsent == 0 and $jour->apremAbsent == 0)
                    Aucune absence,
                @endif
                @if($jour->matinAbsent == 1 and $jour->apremAbsent == 0)
                    A été absent le matin,
                @endif
                @if($jour->matinAbsent == 0 and $jour->apremAbsent == 1)
                    A été absent l'après-midi,
                @endif
                @if($jour->matinAbsent == 1 and $jour->apremAbsent == 1)
                    A été absent le matin et l'après-midi,
                @endif
                @if($jour->matinRetard == 0 and $jour->apremRetard == 0)
                    aucun retard.
                @endif
                @if($jour->matinRetard == 1 and $jour->apremRetard == 0)
                    a été en retard le matin.
                @endif
                @if($jour->matinRetard == 0 and $jour->apremRetard == 1)
                    a été en retard l'après-midi.
                @endif
                @if($jour->matinRetard == 1 and $jour->apremRetard == 1)
                    a été en retard le matin et l'après-midi.
                @endif
                </p>
                <p>Travail matin : {{ $jour->travailMatin ? $jour->travailMatin : 'Aucun travail assigné.'  }}</p>
                <p>Travail après-midi : {{ $jour->travailAprem ? $jour->travailAprem : 'Aucun travail assigné.'  }}</p>
            @endforeach
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
    @endif

    @if($typeForm == "edit")
        {!! Form::open(['method' => 'PUT', 'url' => route('plannings.update', $model), 'class' => 'needs-validation', 'novalidate']) !!}
        <div class="modal-body">
            @foreach($model->jours as $key => $jour)
                <p class="font-weight-bold">
                    le {{ \Carbon\Carbon::parse($model->dateDebut)->addDays($key)->format('d/m/Y') }} : Jour {{ $key + 1  }}
                </p>
                <div class="form-group row justify-content-center">
                    {!! Form::label('retard_'.$key, 'Retard', ['class' => 'col-lg-2 col-form-label']) !!}
                    <div class="col-lg-6">
                        <div class="form-check form-check-inline" style="height: 100%">
                            <input type="hidden" value="0" name="{{'matinRetard_'.$key}}">
                            <input class="form-check-input" type="checkbox" name="{{'matinRetard_'.$key}}" value="1" @if($jour->matinRetard == 1) checked @endif>
                            <label class="form-check-label" for="{{'matinRetard_'.$key}}">matin</label>
                        </div>
                        <div class="form-check form-check-inline" style="height: 100%">
                            <input type="hidden" value="0" name="{{'apremRetard_'.$key}}">
                            <input class="form-check-input" type="checkbox" name="{{'apremRetard_'.$key}}" value="1" @if($jour->apremRetard == 1) checked @endif>
                            <label class="form-check-label" for="{{'apremRetard_'.$key}}">après-midi</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    {!! Form::label('absent_'.$key, 'Absent', ['class' => 'col-lg-2 col-form-label']) !!}
                    <div class="col-lg-6">
                        <div class="form-check form-check-inline" style="height: 100%">
                            <input type="hidden" value="0" name="{{'matinAbsent_'.$key}}">
                            <input class="form-check-input" type="checkbox" name="{{'matinAbsent_'.$key}}" value="1" @if($jour->matinAbsent == 1) checked @endif>
                            <label class="form-check-label" for="{{'matinAbsent_'.$key}}">matin</label>
                        </div>
                        <div class="form-check form-check-inline" style="height: 100%">
                            <input type="hidden" value="0" name="{{'apremAbsent_'.$key}}">
                            <input class="form-check-input" type="checkbox" name="{{'apremAbsent_'.$key}}" value="1" @if($jour->apremAbsent == 1) checked @endif>
                            <label class="form-check-label" for="{{'apremAbsent_'.$key}}">après-midi</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    {!! Form::label('travailMatin_'.$key.'_'.$model->id, 'Travail matin', ['class' => 'col-lg-2 col-form-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::text('travailMatin_'.$key.'_'.$model->id, $jour->travailMatin ? $jour->travailMatin : null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    {!! Form::label('travailAprem_'.$key.'_'.$model->id, 'Travail après-midi', ['class' => 'col-lg-2 col-form-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::text('travailAprem_'.$key.'_'.$model->id, $jour->travailAprem ? $jour->travailAprem : null, ['class' => 'form-control']) !!}
                    </div>
                </div>

            @endforeach
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
        {!! Form::close() !!}
    @endif

    @if($typeForm == "delete")
        {!! Form::open(['url' => route('plannings.destroy', $model), "method" => "delete"]) !!}
        <div class="modal-body">
            <p class="text-center">Voulez vous supprimer le planning de {{ \Carbon\Carbon::parse($model->dateDebut)->format('d/m/Y') }} au {{ \Carbon\Carbon::parse($model->dateFin)->format('d/m/Y') }} ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </div>
        {!! Form::close() !!}
    @endif
@endisset
