<meta charset="UTF-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
    * {
        font-size: 12px;
    }

    .pagBreak {
        page-break-after: always;
    }

    .borderDark {
        border-color: black !important;
    }

    .h-85 {
        height: 85%!important;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <table>
            <tbody>
            <tr>
                <td><img src="https://fakeimg.pl/250x100"></td>
                <td><img src="https://fakeimg.pl/250x100"></td>
                <td><img src="https://fakeimg.pl/250x100"></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-12">
            <p class="text-uppercase text-center font-weight-bold">bilan de l'accueil</p>
        </div>
    </div>

    <div class="row">
        <table class="w-100">
            <tr>
                <td class="w-50"><span class="font-weight-bold">Nom</span> : {{ $eleve->nom }}</td>
                <td><span class="font-weight-bold">Prénom</span> : {{ $eleve->prenom }}</td>
            </tr>
            <tr>
                <td><span class="font-weight-bold">Classe</span> : {{ $eleve->classe }}</td>
                <td><span class="font-weight-bold">Etablissement</span> : {{ $eleve->etablissement->full_name }}</td>
            </tr>
            <tr>
                <td><span class="font-weight-bold">Période d'accueil</span> :</td>
            </tr>
        </table>
    </div>

    <div class="row">
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th rowspan="2"></th>
                <th colspan="2">Absences</th>
                <th colspan="2">Retards</th>
            </tr>
            <tr>
                <th>Matin</th>
                <th>Après-midi</th>
                <th>Matin</th>
                <th>Après-midi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="font-weight-bold">Lundi</td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Mardi</td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Mercredi</td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Jeudi</td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Vendredi</td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
            </tr>
            </tbody>
        </table>
    </div>

    <p class="text-uppercase text-center font-weight-bold">planning</p>

    <div class="row">
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th class="w-25"></th>
                <th class="text-uppercase">matin<br>9h30-12h30</th>
                <th class="text-uppercase">après-midi<br>14h-16h30</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="font-weight-bold">Lundi</td>
                <td>X</td>
                <td>X</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Mardi</td>
                <td>X</td>
                <td>X</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Mercredi</td>
                <td>X</td>
                <td>X</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Jeudi</td>
                <td>X</td>
                <td>X</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Vendredi</td>
                <td>X</td>
                <td>X</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Mesures mises en place</td>
                <td>X</td>
                <td>X</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row">
        <table class="w-100">
            <tr>
                <td class="w-50 font-weight-bold">Signature du jeune :</td>
                <td class="w-50 font-weight-bold">Signature de l'éducateur :</td>
            </tr>
        </table>
    </div>
</div>

<div class="pagBreak"></div>

<div class="container-fluid">
    <div class="row">
        <table>
            <tbody>
            <tr>
                <td><img src="https://fakeimg.pl/250x100"></td>
                <td><img src="https://fakeimg.pl/250x100"></td>
                <td><img src="https://fakeimg.pl/250x100"></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-12">
            <p class="text-uppercase text-center font-weight-bold">bilan global (éducateur)</p>
        </div>
    </div>

    <div class="row">
        <table class="w-100">
            <tr>
                <td class="w-50"><span class="font-weight-bold">Nom et prénom de l'élève :</span> {{ $eleve->nom }}</td>
            </tr>
            <tr>
                <td class="w-50"><span class="font-weight-bold">Période d'accueil :</span> {{ $eleve->nom }}</td>
            </tr>
        </table>
    </div>

    <div class="row">
        <div class="border h-85" style="border-color: black;">
            <p class="font-italic px-2 pt-2">Connaissances/compétences/comportement/adaptation/mode de
                vie/projets/propositions...</p>
            <p class="p-2">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolorem doloribus dolorum explicabo, fugit, iste iusto laboriosam libero nulla numquam odio omnis pariatur, placeat qui reiciendis sequi ut voluptatum?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam aspernatur dolor eius explicabo facere in ipsum nam, neque quod, soluta tenetur vitae voluptatum! Architecto asperiores ea est ipsam voluptates!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolorem doloribus dolorum explicabo, fugit, iste iusto laboriosam libero nulla numquam odio omnis pariatur, placeat qui reiciendis sequi ut voluptatum?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam aspernatur dolor eius explicabo facere in ipsum nam, neque quod, soluta tenetur vitae voluptatum! Architecto asperiores ea est ipsam voluptates!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolorem doloribus dolorum explicabo, fugit, iste iusto laboriosam libero nulla numquam odio omnis pariatur, placeat qui reiciendis sequi ut voluptatum?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam aspernatur dolor eius explicabo facere in ipsum nam, neque quod, soluta tenetur vitae voluptatum! Architecto asperiores ea est ipsam voluptates!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolorem doloribus dolorum explicabo, fugit, iste iusto laboriosam libero nulla numquam odio omnis pariatur, placeat qui reiciendis sequi ut voluptatum?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam aspernatur dolor eius explicabo facere in ipsum nam, neque quod, soluta tenetur vitae voluptatum! Architecto asperiores ea est ipsam voluptates!
            </p>
        </div>
    </div>

</div>


<div class="pagBreak"></div>

<div class="container-fluid">
    <div class="row">
        <table>
            <tbody>
            <tr>
                <td><img style="width: 200px;" src="{{ asset('assets/images/apcis.jpg') }}"></td>
                <td><img style="width: 200px;" src="{{ asset('assets/images/academie_creteil.png') }}"></td>
                <td><img style="width: 200px;" src="{{ asset('assets/images/logo_ue.png') }}"></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-12">
            <p class="text-uppercase text-center font-weight-bold">auto-evaluation(élève)</p>
        </div>
    </div>

    <div class="row">
        <table class="w-100">
            <tr>
                <td class="w-50"><span class="font-weight-bold">Nom et prénom de l'élève :</span> {{ $eleve->nom }}</td>
                <td class="w-50"><span class="font-weight-bold">Classe :</span> {{ $eleve->classe }}</td>
            </tr>
            <tr>
                <td class="w-50"><span class="font-weight-bold">Période d'accueil :</span> {{ $eleve->nom }}</td>
            </tr>
        </table>
    </div>

    <div class="row">
        <div class="border h-85" style="border-color: black;">
            <p class="font-italic px-2 pt-2">
                Pourquoi es-tu venu(e) à l'APCIS ? Comment cela s'est-il passé ? Quel travail as-tu effectué ? As-tu bien compris ce qu'on demandait ? Cela t'a intéréssé ? T'es-tu bien senti(e) dans l'équipe ? et avec les autres élèves ? qu'as-tu retenu de ces journées passées à l'APCIS ?
            </p>
            <p class="p-2">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse et excepturi ipsa laborum nostrum optio
                ullam ut. Accusamus, ad aspernatur atque doloribus eum facere officia, quae quasi saepe, sed ut.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolorem doloribus dolorum explicabo, fugit, iste iusto laboriosam libero nulla numquam odio omnis pariatur, placeat qui reiciendis sequi ut voluptatum?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam aspernatur dolor eius explicabo facere in ipsum nam, neque quod, soluta tenetur vitae voluptatum! Architecto asperiores ea est ipsam voluptates!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolorem doloribus dolorum explicabo, fugit, iste iusto laboriosam libero nulla numquam odio omnis pariatur, placeat qui reiciendis sequi ut voluptatum?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam aspernatur dolor eius explicabo facere in ipsum nam, neque quod, soluta tenetur vitae voluptatum! Architecto asperiores ea est ipsam voluptates!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolorem doloribus dolorum explicabo, fugit, iste iusto laboriosam libero nulla numquam odio omnis pariatur, placeat qui reiciendis sequi ut voluptatum?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam aspernatur dolor eius explicabo facere in ipsum nam, neque quod, soluta tenetur vitae voluptatum! Architecto asperiores ea est ipsam voluptates!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dignissimos dolorem doloribus dolorum explicabo, fugit, iste iusto laboriosam libero nulla numquam odio omnis pariatur, placeat qui reiciendis sequi ut voluptatum?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam aspernatur dolor eius explicabo facere in ipsum nam, neque quod, soluta tenetur vitae voluptatum! Architecto asperiores ea est ipsam voluptates!
            </p>
        </div>
    </div>
</div>
