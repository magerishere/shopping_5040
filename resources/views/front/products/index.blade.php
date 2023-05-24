@extends('front.layouts.master')


@section('content')
    <x-front.container>
        <div class="row gy-5">
            @foreach($products as $product)
                <div class="col-12">
                    @include('front.products.partials._product_item_card',['product' => $product])
                </div>

            @endforeach
        </div>

    </x-front.container>
@endsection
