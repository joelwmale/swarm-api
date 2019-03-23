<?php

use Swarm\Users\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the users table.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'joel@joelmale.com',
            'password' => Hash::make('abcd1234!'),

            'username' => 'squid',
        ]);
    }
}
