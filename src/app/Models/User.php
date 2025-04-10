<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Restaurant::class, 'favorites', 'user_id', 'restaurant_id');
    }

    public function hasFavorited($restaurant)
    {
        return $this->favorites()->where('restaurant_id', $restaurant->id)->exists();
    }

    const ROLE_ADMIN = 'admin';
    const ROLE_OWNER = 'owner';
    const ROLE_USER = 'user';

    // ロールチェックメソッド
    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isOwner()
    {
        return $this->role === self::ROLE_OWNER;
    }

    public function isUser()
    {
        return $this->role === self::ROLE_USER;
    }
}
