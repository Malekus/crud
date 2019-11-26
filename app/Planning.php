<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{

    protected $fillable = ['dateDebut', 'dateFin', 'bilan_id'];

    protected static function boot()
    {
        parent::boot();

        self::created(function ($model) {
            $model->bilan->updated_at = Carbon::now();
            $model->bilan->save();
        });

        self::updated(function ($model) {
            $model->bilan->updated_at = Carbon::now();
            $model->bilan->save();
        });

        self::deleted(function ($model) {
            $model->bilan->updated_at = Carbon::now();
            $model->bilan->save();
        });

    }

    public function bilan()
    {
        return $this->belongsTo(Bilan::class);
    }

    public function jours()
    {
        return $this->hasMany(Jour::class);
    }
}
