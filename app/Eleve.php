<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $guarded = ['id'];

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }
}