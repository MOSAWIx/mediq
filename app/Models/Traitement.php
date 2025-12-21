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
        'important',
        'pris',
    ];
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function medecin()
    {
        return $this->belongsTo(User::class, 'medecin_id');
    }
}

