<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::resourceVerbs([
            'create' => 'crea',
            'edit' => 'modifica',
        ]);

        Model::preventLazyLoading(! app()->isProduction());

        Blade::directive('admin', function () {
            return '<?php if(auth()->check() && auth()->user()->isAdmin()): ?>';
        });

        Blade::directive('endadmin', function () {
            return '<?php endif; ?>';
        });

        Gate::define('viewPulse', function (User $user) {
            return $user->isAdmin();
        });

    }
}
