<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements HasAvatar
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'active',
        'birthdate',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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

   
    
    /**
     * Get the URL for the user's avatar.
     *
     * @return string|null
     */
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar ? asset('storage/' . $this->avatar) : null;
    }

    public function setAvatarAttribute($value)
    {
        // Si se elimina el avatar (valor null o vacío) o se actualiza
        if ($this->avatar && ($this->avatar !== $value || empty($value))) {
            Storage::disk('public')->delete($this->avatar);
        }
        $this->attributes['avatar'] = $value;
    }

    //Crear relació amb el model Rol
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'role', 'name');        
    }
}