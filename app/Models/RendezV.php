<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezV extends Model
{
    use HasFactory;
    protected $table = '_r_d_v';
    protected $fillable = [
        'user_id', 'pet_id', 'veterinaire_id', 'date', 'heure', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id');
    }

    public function veto()
    {
        return $this->belongsTo(Vetos::class, 'veterinaire_id');
    }
}
