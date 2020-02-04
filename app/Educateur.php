<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Educateur extends Model
{
    protected $guarded = ['id'];

    public function getFullNameAttribute()
    {
        return $this->nom . '  ' . $this->prenom;
    }

    public function eleves()
    {
        return $this->hasMany(Eleve::class);
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
