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
        User::create([
            'email'    => 'joel@joelmale.com',
            'password' => Hash::make('abcd1234!'),

            'username' => 'squid',
        ]);
    }
}
