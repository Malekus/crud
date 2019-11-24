<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    protected $fillable = ['nom'];

    protected $guarded = ['id'];

    public function getFullNameAttribute()
    {
        return $this->nom . ' - ' . $this->ville;
    }
}
