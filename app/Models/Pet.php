<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'petprofile';
    protected $fillable = [
        'Nom', 'Espèce', 'Race', 'Age', 'Sexe', 'Description', 'Image'
    ];

    
    public function notes()
    {
        return $this->hasMany(PetNote::class);
    }
    public function appointments()
    {
        return $this->hasMany(RendezV::class);
    }
}
