<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApiToken;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the users table.
     *
     * @return void
     */
    public function run()
    {
        // Make a test user
        $user = User::create([
            'email'    => 'test@test.com',
            'password' => Hash::make('abcd1234!'),
            'username' => 'test_user',
        ]);

        // Make a test api token
        ApiToken::create([
            'user_id' => $user->id,
            'token'   => 'test',
            'enabled' => true,
        ]);
    }
}
