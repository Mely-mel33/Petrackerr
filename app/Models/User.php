<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'usertype',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    /**
     * Get the profile photo path for the user.
     *
     * @return string
     */
    public function profile_photo_path()
    {
        return $this->profile_photo_path ?? 'default_profile_photo.jpg';
    }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function alertes()
    {
        return $this->hasMany(Alerte::class);
    }
    public function veto()
    {
        return $this->hasOne(Vetos::class);
    }
    public function Pet()
    {
        return $this->hasMany(Pet::class);
    }
    public function rendezVous()
    {
        return $this->hasMany(RendezV::class, 'user_id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function Adoption()
    {
        return $this->hasMany(adoption::class);
    }
}
