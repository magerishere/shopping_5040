<?php

namespace App\Services;


use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cookie;

class CartService
{

    /**
     * Create a new CartService service.
     *
     * @return void
     */
    public function __construct(protected VariationService $variationService)
    {
        //
    }

    private function getQuery(): Builder
    {
        return Cart::query();
    }

    public function getGuestCart(): Collection
    {
        $cartItems = Cookie::get('cart_items');
        $cartItems = $cartItems ? json_decode($cartItems, true) : [];
        $cartItems = collect($cartItems);

        return $cartItems->map(function ($cartItem) {
            $variation = $this->variationService->getById($cartItem['variation_id']);
            $cartItem['variation'] = $variation;
            $cartItem['product'] = $variation->product;
            $cartItem['totalPrice'] = (int)$variation->price * (int)$cartItem['qty'];
            return (object)$cartItem;
        });
    }

    public function add(array $data): Collection
    {
        $guestCartItems = $this->getGuestCart();
        if ((int)$data['qty'] <= 0) {
            return $guestCartItems;
        }

        $guestCartItems = $guestCartItems->reject(function ($cartItem) use ($data) {
            return $cartItem->variation_id == $data['variation_id'];
        });

        $guestCartItems->push([
            'variation_id' => $data['variation_id'],
            'qty' => $data['qty'],
        ]);

        $this->setGuestCartToCookie($guestCartItems);
        return $guestCartItems;
    }

    public function update(array $data): Collection
    {
        $this->emptyGuestCart();
        $data = collect($data)->reject(fn($item) => $item['qty'] <= 0)->map(function ($item) {
            return [
                'variation_id' => $item['id'],
                'qty' => $item['qty'],
            ];
        });

        $this->setGuestCartToCookie($data);
        return $data;
    }

    public function setGuestCartToCookie($data): void
    {
        Cookie::queue('cart_items', $data, 1000);
    }

    public function emptyGuestCart(): void
    {
        Cookie::forget('cart_items');
    }


}
