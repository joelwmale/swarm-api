<?php

namespace Swarm\Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Swarm\Users\User;

class ApiToken extends Model
{
    public $fillable = [
        'id',
        'user_id',
        'token',
        'enabled',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Create unique token
            $model->token = static::generateRandomString();
        });
    }

    /**
     * The user that owns this token.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Generate a random api token.
     *
     * @param length $length
     *
     * @return string
     */
    protected static function generateRandomString($length = 60): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
