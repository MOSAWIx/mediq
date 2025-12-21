<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriseTraitement extends Model
{
    protected $fillable = [
        'traitement_id',
        'heure',
        'pris',
    ];

    public function traitement()
    {
        return $this->belongsTo(Traitement::class);
    }
}