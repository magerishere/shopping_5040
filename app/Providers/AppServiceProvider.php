<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Vite;
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
        $this->viteComposer();
        $this->directiveComposer();
    }

    private function viteComposer()
    {
        Vite::macro('image', fn(string $asset) => $this->asset("images/{$asset}", 'back'));
    }

    private function directiveComposer()
    {
        Blade::if('session', function (string $sessionKey) {
            return Session::has($sessionKey);
        });
    }
}
