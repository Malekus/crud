<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $fillable = ['nom', 'prenom', 'sexe', 'dateNaissance','classe', 'ville', 'etablissement_id', 'educateur_id'];

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }

    public function educateur()
    {
        return $this->belongsTo(Educateur::class);
    }

    public function bilans()
    {
        return $this->hasMany(Bilan::class);
    }
}
