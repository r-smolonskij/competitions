<?php

namespace App\Providers;

use App\Competition;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-competition', function ($user, $competition) {
            return $user->id === $competition->user_id;
        });
        Gate::define('event-isOrganizator', function ($user, $event) {
            $competition = Competition::find($event->competition_id);
            return $user->id === $competition->user_id;
        });
        Gate::define('competition-isOrganizator', function ($user, $competition) {
            return $user->id === $competition->user_id;
        });
    }
}
