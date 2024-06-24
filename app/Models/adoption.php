<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adoption extends Model
{
    use HasFactory;
    protected $table = 'adoptions';
    protected $fillable = [
     'pet_id',
     'user_id',
     'full_name',
     'phone',
     'address',
    
'status','remarque'
 ];

 public function pet()
 {
     return $this->belongsTo(Pet::class);
 }

 public function user()
 {
     return $this->belongsTo(User::class);
 }
}
