<x-front.card>
    <div class="row">
        <div class="col-12 col-md-4">
            <div>
                <span>title: </span> <span class="fw-bold">{{$cartItem->product?->title}}</span>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div>
                <span>Price: </span> <span class="fw-bold">{{number_format($cartItem->variation?->price)}}</span>
            </div>
            <div>
                <span>Qty: </span> <span class="fw-bold">{{$cartItem->qty}}</span>
            </div>
            <div>
                <span>Total Price: </span> <span class="fw-bold">{{number_format($cartItem->totalPrice)}}</span>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <x-front.input
                inputType="hidden"
                inputId="variation_id_{{$cartItem->variation?->id}}"
                inputName="variation_ids[{{$cartItem->variation?->id}}][id]"
                inputValue="{{$cartItem->variation?->id}}"
            />
            <x-front.input
                inputType="number"
                inputId="qty_{{$cartItem->variation?->id}}"
                inputName="variation_ids[{{$cartItem->variation?->id}}][qty]"
                inputValue="{{$cartItem->qty}}"
                data-min-value="1"
            />
            <x-front.button buttonColor="danger" data-cart-item-remover="#qty_{{$cartItem->variation?->id}}">
                Remove <i class="bi bi-trash"></i>
            </x-front.button>
        </div>
    </div>

</x-front.card>
