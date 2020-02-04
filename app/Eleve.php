<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $fillable = ['nom', 'prenom', 'sexe', 'dateNaissance', 'classe', 'ville', 'etablissement_id', 'educateur_id'];

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

    public function plannings()
    {
        return $this->hasManyThrough(Planning::class, Bilan::class);
    }

    public function setNomAttribute($value)
    {
        $this->attributes['nom'] = strtoupper($value);
    }

    public function setPrenomAttribute($value)
    {
        $this->attributes['prenom'] = ucfirst($value);
    }

}
