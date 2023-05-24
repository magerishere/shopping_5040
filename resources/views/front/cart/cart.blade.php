@extends('front.layouts.master')


@section('content')
    <x-front.container>
        <x-front.card>
            <h1 class="text-center">Cart Items</h1>
            @if($cartItems->isEmpty())
                <div class="mt-5">
                    <div class="alert alert-warning text-center">
                        <h4>
                            You have no items in cart
                        </h4>
                        <x-front.button buttonColor="dark" buttonLink="{{route('products.index')}}">
                            Go To Products List <i class="bi bi-arrow-up-circle"></i>
                        </x-front.button>
                    </div>

                </div>
            @else
                <x-front.form routeName="{{route('cart.update')}}" formMethod="PATCH">

                    @foreach($cartItems as $cartItem)
                        <div class="col-12">
                            @include('front.cart.partials._cart_item',['cartItem' => $cartItem])
                        </div>

                    @endforeach
                    <div class="alert alert-primary">
                        <h6>TotalPrice: {{number_format($cartItemsTotalPriceWithQty)}}</h6>
                    </div>
                    <x-slot:submitButtonSlot>
                        <div class="mt-5">

                            <x-front.button>
                                Update Cart <i class="bi bi-arrow-up-circle"></i>
                            </x-front.button>
                        </div>

                    </x-slot:submitButtonSlot>

                </x-front.form>
            @endif

        </x-front.card>
    </x-front.container>
@endsection
