<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vetos extends Model
{
    use HasFactory;
    protected $table = 'veto';
    protected $fillable = [
        'nom', 'prenom', 'numtel', 'nom_cabinet',
        'heure_travail', 'frais_consultation', 'localisation', 'description', 'image',' approved'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
