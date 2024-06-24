<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'comment_id',
    ];

    // Relation avec l'utilisateur qui a écrit la réponse
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec le commentaire auquel la réponse est associée
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
