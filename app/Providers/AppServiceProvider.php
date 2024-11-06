<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
    * Register any application services.
    */

    public function register(): void {
        //
    }

    /**
    * Bootstrap any application services.
    */

    public function boot(): void {
        // URL::forceScheme( 'https' );
        Gate::define('viewAuthSetup', function (\DevDojo\Auth\Models\User $user) {
            return in_array($user->email, [
                'khfii635@gmail.com',
            ]);
        });
        Model::preventLazyLoading( !$this->app->isProduction() );
    }
}
