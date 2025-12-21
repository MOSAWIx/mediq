<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Traitement extends Model
{
    protected $fillable = [
        'patient_id',
        'medecin_id',
        'nom_medicament',
        'dosage',
        'heure_prise',
        'fois_par_jour',
        'duree_jours',
        'important',
    ];
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function medecin()
    {
        return $this->belongsTo(User::class, 'medecin_id');
    }
     public function prises()
    {
        return $this->hasMany(PriseTraitement::class);
    }
}

