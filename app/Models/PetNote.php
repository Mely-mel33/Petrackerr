<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id', 'title', 'date', 'time', 'description'
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}