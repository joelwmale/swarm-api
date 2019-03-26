<?php

namespace Swarm\Users;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Swarm\Auth\ApiToken;
use Swarm\Players\Player;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

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
     * Get the token the user owns
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
}
