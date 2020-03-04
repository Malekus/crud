<meta charset="UTF-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    * {
        font-size: 12px;
    }
    .pagBreak {
         page-break-after: always;
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
</div>
