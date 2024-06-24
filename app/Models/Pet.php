<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'petprofile';
    protected $fillable = [
        'Nom', 'Espèce', 'Race', 'Age', 'Sexe', 'Description', 'Image','is_adoptable'
    ];

    
    public function notes()
    {
        return $this->hasMany(PetNote::class);
    }
    public function appointments()
    {
        return $this->hasMany(RendezV::class);
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
