@extends('back.layouts.master')


@section('content')
    <x-back.container>
        <x-back.card>
            @if($products->isEmpty())
                <div class="alert alert-secondary text-center">
                    <h3> You have no products.</h3>
                    <x-back.button buttonLink="{{route('admin.products.create')}}">
                        Create One <i class="bi bi-plus"></i>
                    </x-back.button>
                </div>
            @else
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Brief Content</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        @include('back.products.partials._product_table_item', ['product' => $product])
                    @endforeach
                    </tbody>
                </table>
            @endif

        </x-back.card>
    </x-back.container>
@endsection
