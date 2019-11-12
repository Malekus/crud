<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{

    protected $fillable = ['dateDebut', 'dateFin', 'bilan_id'];

    public function bilan()
    {
        return $this->hasOne(Bilan::class);
    }

    public function jours()
    {
        return $this->hasMany(Jour::class);
    }
}
