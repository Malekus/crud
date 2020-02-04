<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jour extends Model
{

    protected $fillable = ['dateExclu', 'matinAbsent', 'apremAbsent', 'matinRetard', 'apremRetard'];

    public function planning()
    {
        return $this->belongsTo(Planning::class);
    }

    public function getEtablissementAttribute(){
        return $this->planning->bilan->eleve->etablissement->nom;
    }

    public function getVilleAttribute(){
        return empty($this->planning->bilan->eleve->etablissement->ville) ? "N/A" : $this->planning->bilan->eleve->etablissement->ville;
    }

    public function getNomPrenomAttribute(){
        return $this->planning->bilan->eleve->nom . " " . $this->planning->bilan->eleve->prenom;
    }

}
