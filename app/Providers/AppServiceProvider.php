<?php

namespace App\Providers;

use App\Services\CartService;
use App\Services\VariationService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
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
        $this->variablesComposer();
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

    private function variablesComposer()
    {
        View::composer('*', function () {
            $cartService = new CartService(new VariationService());
            $guestCart = $cartService->getGuestCart();
            $cartItemsCountWithQty = $guestCart->sum(function ($cartItem) {
                return (int)$cartItem->qty;
            });
            $cartItemsTotalPriceWithQty = $guestCart->sum(function ($cartItem) {
                return (int)$cartItem->totalPrice;
            });


            View::share(compact('cartItemsCountWithQty', 'cartItemsTotalPriceWithQty'));

        });
    }
}
