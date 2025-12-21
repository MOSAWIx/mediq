<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'emergency_name',
        'emergency_phone',
        'emergency_relation',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function rendezvous() {
        return $this->hasMany(Rendezvous::class);
    }

    public function traitements() {
        return $this->hasMany(Traitement::class);
    }
}
