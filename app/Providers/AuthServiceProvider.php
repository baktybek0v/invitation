<?php

namespace App\Providers;

use App\Models\CalendarDriver;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        //Passport::routes();
        $this->registerPolicies();


        /*Gate::define('my-index-hall', function(User $user) {
            if ($user->getRoleName() == 'Администратор') {
                return Response::allow();
            }
        });*/
    }
}
