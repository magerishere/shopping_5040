<x-mail::message>
    # Product Created

    Product {{$product->title}} created by {{$product->user?->email}}


    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
