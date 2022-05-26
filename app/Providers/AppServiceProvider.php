<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{

    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //禁用HTML实体双重编码
        // Blade::withoutDoubleEncoding();
        
        // $this->registerPolicies();

        // if (! $this->app->routesAreCached()) {
        //     Passport::routes();
        // }

        // Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');
    }
}
