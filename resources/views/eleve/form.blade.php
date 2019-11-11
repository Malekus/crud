@isset($typeForm)
    @if($typeForm == "create")
        {!! Form::open(['url' => route('eleves.store'), 'class' => 'needs-validation', 'novalidate']) !!}
        <div class="modal-body">
            <div class="form-group row justify-content-center">
                {!! Form::label('nom', 'Nom', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::text('nom', null, ['class' => 'form-control', 'required']) !!}
                    <div class="invalid-feedback">
                        Saisir un nom
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                {!! Form::label('prenom', 'Prénom', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::text('prenom', null, ['class' => 'form-control', 'required']) !!}
                    <div class="invalid-feedback">
                        Saisir un nom
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                {!! Form::label('dateNaissance', 'Date de naissance', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::date('dateNaissance', null, ['class' => 'form-control', 'required']) !!}
                    <div class="invalid-feedback">
                        Saisir un nom
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                {!! Form::label('classe', 'Classe', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::select('classe', ['6ème' => '6ème', '5ème' => '5ème', '4ème' => '4ème', '3ème' => '3ème'], '6ème', ['class' => 'form-control']) !!}
                    <div class="invalid-feedback">
                        Saisir un nom
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                {!! Form::label('ville', 'Ville', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::select('ville', ['Stains' => 'Stains', 'Bagnolet' => 'Bagnolet', 'Epinay-sur-seine' => 'Epinay-sur-seine'], 'Stains', ['class' => 'form-control']) !!}
                    <div class="invalid-feedback">
                        Saisir un nom
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                {!! Form::label('etablissement', 'Etablissement', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::select('etablissement', \App\Etablissement::all()->pluck('full_name', 'id'), null,['class' => 'form-control']) !!}
                    <div class="invalid-feedback">
                        Saisir un nom
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                {!! Form::label('educateur', 'Educateur', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::select('educateur', \App\Educateur::all()->pluck('full_name', 'id'), null,['class' => 'form-control']) !!}
                    <div class="invalid-feedback">Saisir un educateur</div>
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
        {!! Form::model($model, ['method'=>"PUT", 'url' => route('eleves.update', $model), 'class' => 'needs-validation', 'novalidate']) !!}
        <div class="modal-body">
            <div class="form-group row justify-content-center">
                {!! Form::label('nom', 'Nom', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::text('nom', $model->nom, ['class' => 'form-control', 'required']) !!}
                    <div class="invalid-feedback">
                        Saisir un nom
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                {!! Form::label('prenom', 'Prénom', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::text('prenom', $model->prenom, ['class' => 'form-control', 'required']) !!}
                    <div class="invalid-feedback">
                        Saisir un prénom
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                {!! Form::label('dateNaissance', 'Date de naissance', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::date('dateNaissance', $model->dateNaissance, ['class' => 'form-control', 'required']) !!}
                    <div class="invalid-feedback">
                        Saisir une date de naissance
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                {!! Form::label('classe', 'Classe', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::select('classe', ['6ème' => '6ème', '5ème' => '5ème', '4ème' => '4ème', '3ème' => '3ème'], $model->classe, ['class' => 'form-control']) !!}
                    <div class="invalid-feedback">
                        Saisir une classe
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                {!! Form::label('ville', 'Ville', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::select('ville', ['Stains' => 'Stains', 'Bagnolet' => 'Bagnolet', 'Epinay-sur-seine' => 'Epinay-sur-seine'], $model->ville, ['class' => 'form-control']) !!}
                    <div class="invalid-feedback">
                        Saisir une ville
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                {!! Form::label('etablissement', 'Etablissement', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::select('etablissement', \App\Etablissement::all()->pluck('full_name', 'id'), $model->etablissement->id,['class' => 'form-control']) !!}
                    <div class="invalid-feedback">Saisir un établissement</div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                {!! Form::label('educateur', 'Educateur', ['class' => 'col-lg-2 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! Form::select('educateur', \App\Educateur::all()->pluck('full_name', 'id'), $model->educateur->id,['class' => 'form-control']) !!}
                    <div class="invalid-feedback">Saisir un educateur</div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-success">Éditer</button>
        </div>
        {!! Form::close() !!}
    @endif

    @if($typeForm == "delete")
        {!! Form::open(['url' => route('eleves.destroy', $model), "method" => "delete"]) !!}
        <div class="modal-body">
            <p class="text-center">Voulez vous supprimer l'élève {{ $model->nom }} {{ $model->prenom }} ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </div>
        {!! Form::close() !!}
    @endif
@endisset




