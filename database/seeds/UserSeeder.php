<?php

use Illuminate\Database\Seeder;
use Swarm\Users\User;

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
        $user->token()->create([
            'token' => 'o3eBa0J3s3kBtqAmHv2JMPrUUhgZ6jrRdv9wU67yrTgm7GqC4BlKmKg1l2ks',
        ]);
    }
}
