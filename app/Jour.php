<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jour extends Model
{

    public function planning()
    {
        return $this->belongsTo(Planning::class);
    }
}
