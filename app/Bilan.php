<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bilan extends Model
{
    protected $fillable = ['dateDebut', 'dateFin', 'rapport'];

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }

    public function planning()
    {
        return $this->hasOne(Planning::class);
    }
}
