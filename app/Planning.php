<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{

    public function bilan()
    {
        return $this->hasOne(Bilan::class);
    }

    public function jours()
    {
        return $this->hasMany(Jour::class);
    }
}
