<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

       /**
     * Get the token the user owns.
     *
     * @return HasOne
     */
    public function token(): HasOne
    {
        return $this->hasOne(ApiToken::class);
    }

    /**
     * Get the users players.
     *
     * @return HasOne
     */
    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }

    /**
     * Return true if the user is an admin
     *
     * @return bool
     */
    public function getIsAdminAttribute(): bool
    {
        return $this->admin;
    }
}
