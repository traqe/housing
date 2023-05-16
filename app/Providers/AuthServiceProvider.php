<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isEngineering', function ($user) {
            return $user->housingRole->role_id == 0;
        });

        Gate::define('isSuperAdministrator', function ($user) {
            return $user->housingRole->role_id == 1;
        });

        Gate::define('isHousingClerk', function ($user) {
            return $user->housingRole->role_id == 2;
        });

        Gate::define('isApprover', function ($user) {
            return $user->housingRole->role_id == 3;
        });

        Gate::define('isAccounts', function ($user) {
            return $user->housingRole->role_id == 4;
        });
    }
}
