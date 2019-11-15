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
}
