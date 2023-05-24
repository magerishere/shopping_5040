<?php

namespace App\Http\Controllers\Front;


use App\Http\Requests\Front\CartAddRequest;
use App\Http\Requests\Front\CartUpdateRequest;
use App\Services\CartService;

class CartController extends FrontController
{
    public function __construct(protected CartService $cartService)
    {

    }

    public function index()
    {
        $cartItems = $this->cartService->getGuestCart();
        return view('front.cart.cart', compact('cartItems'));
    }

    public function add(CartAddRequest $request)
    {
        try {
            $this->cartService->add($request->all());
            $this->showSuccessAlert("Your cart successfully updated");
            return to_route('cart.index');
        } catch (\Exception $exception) {
            report($exception);
            $this->showErrorAlert($exception->getMessage());
            return back();
        }

    }

    public function update(CartUpdateRequest $request)
    {
        try {
            $this->cartService->update($request->get('variation_ids'));
            $this->showSuccessAlert("Your cart successfully updated");
            return to_route('cart.index');
        } catch (\Exception $exception) {
            report($exception);
            $this->showErrorAlert($exception->getMessage());
            return back();
        }

    }

}
