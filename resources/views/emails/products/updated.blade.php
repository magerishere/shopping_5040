<x-mail::message>
    # Product Updated

    Product {{$product->title}} updated by {{$product->user?->email}}


    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
