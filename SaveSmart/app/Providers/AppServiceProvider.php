<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\FamilyAuth;

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
        //
    }
    protected function configureMiddleware($middleware): void
    {
        $middleware->alias([
            'family.auth' => FamilyAuth::class,
        ]);
    }
}
