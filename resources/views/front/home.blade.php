@extends('front.layouts.master')


@section('content')
    <x-front.container>
        <div style="min-height: 400px">

            <x-front.card cardClass="text-center">
                <x-back.button buttonLink="{{route('products.index')}}">
                    Go To Products List
                </x-back.button>
            </x-front.card>
        </div>

    </x-front.container>
@endsection
