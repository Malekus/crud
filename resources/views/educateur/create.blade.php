@extends('layout.base')

@section('titre')
    · Ajouter un educateur
@endsection

@section('content')
    @include('layout.headerTop', ['titleHeader' => "Ajouter un educateur", 'iconHeader' => 'fa-users'])
    <div class="col-lg-12">
        {!! Form::open(['url' => route('educateurs.store'), 'class' => 'needs-validation', 'novalidate']) !!}

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
                    Saisir un prénom
                </div>
            </div>
        </div>

        <div class="form-row text-center">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
    @include('layout.headerBottom')
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