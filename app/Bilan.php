<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bilan extends Model
{
    protected $fillable = ['dateDebut', 'dateFin', 'rapport', 'eleve_id'];

    protected static function boot()
    {
        parent::boot();

        self::updating(function ($model) {
            if (Carbon::parse($model->dateFin)->diffInDays($model->dateDebut) < count($model->planning->jours)) {
                $model->planning()->delete();
                $planning = new Planning(['dateDebut' => $model->dateDebut, 'dateFin' => $model->dateFin]);
                $planning->bilan()->associate($model);
                $planning->save();
                for ($i = 0; $i < Carbon::parse($model->dateFin)->diffInDays($model->dateDebut); $i++) {
                    $dateExclu = Carbon::parse($model->dateDebut)->addDays($i);
                    $jour = new Jour(['dateExclu' => $dateExclu, 'matinAbsent' => 0, 'apremAbsent' => 0, 'matinRetard' => 0, 'apremRetard' => 0]);
                    $jour->planning()->associate($planning->id);
                    $jour->save();
                }
            }
            $model->planning()->update(['dateDebut' => $model->dateDebut, 'dateFin' => $model->dateFin]);
            if (Carbon::parse($model->dateFin)->diffInDays($model->dateDebut) > count($model->planning->jours)) {
                for ($i = 0; $i < Carbon::parse($model->dateFin)->diffInDays($model->dateDebut); $i++) {
                    $dateExclu = Carbon::parse($model->dateDebut)->addDays($i);
                    if (Jour::where(['dateExclu' => $dateExclu, 'planning_id' => $model->planning->id])->first() === null) {
                        $jour = new Jour(['dateExclu' => $dateExclu, 'matinAbsent' => 0, 'apremAbsent' => 0, 'matinRetard' => 0, 'apremRetard' => 0]);
                        $jour->planning()->associate($model->planning->id);
                        $jour->save();
                    }
                }
            }
        });

        self::created(function ($model) {
            $model->eleve->updated_at = Carbon::now();
            $model->eleve->save();
        });

        self::updated(function ($model) {
            $model->eleve->updated_at = Carbon::now();
            $model->eleve->save();
        });

        self::deleted(function ($model) {
            $model->eleve->updated_at = Carbon::now();
            $model->eleve->save();
        });

    }

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }

    public function planning()
    {
        return $this->hasOne(Planning::class);
    }
}
