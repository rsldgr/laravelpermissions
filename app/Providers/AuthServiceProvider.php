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

        /* is_admin kapısını oluşturuyoruz admin controller kısmına sadece bu değere sahipler ulaşabilecek*/
        Gate::define('is_admin', function ($user) {
            return $user->is_admin;
        });
        /* is_banned kapısını şimidden oluşturmak istedim. middleware ile bloklayacağız onlara özel bir sayfa göstereceğiz*/
        /* banlı değilse */
        Gate::define('is_banned', function ($user) {
            return !$user->is_banned;
        });
    }
}
