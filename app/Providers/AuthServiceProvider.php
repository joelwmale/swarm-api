<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Swarm\Players\PlayerTeam;
use Swarm\Policies\PlayerTeamPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        PlayerTeam::class => PlayerTeamPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::guessPolicyNamesUsing(function ($modelClass) {
        //     $reflect = new \ReflectionClass($modelClass);

        //     return 'Swarm\Policies\\' . $reflect->getShortName() . 'Policy::class';
        //     // return policy class name...
        // });
    }
}
