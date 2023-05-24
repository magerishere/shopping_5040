<x-front.card>
    <div class="row">
        <div class="col-12 col-md-3">
            <img src="{{$product->defaultImage?->getUrl()}}" alt="Product Image">
        </div>
        <div class="col-12 col-md-6">
            <h4>{{$product->title}}</h4>
            <p>{{$product->brief_content}}</p>
        </div>
        <div class="col-12 col-md-3">
            <x-front.form routeName="{{route('cart.add')}}">
                <x-front.input
                    inputType="hidden"
                    inputId="variation_id"
                    inputName="variation_id"
                    inputValue="{{$product->variation?->id}}"
                />
                <x-front.input
                    inputType="number"
                    inputId="qty"
                    inputName="qty"
                    inputValue="1"
                    data-min-value="1"


                />
                <x-slot:submitButtonSlot>
                    <x-front.button>
                        Add to Cart <i class="bi bi-plus-circle"></i>
                    </x-front.button>
                </x-slot:submitButtonSlot>
            </x-front.form>
        </div>
    </div>
</x-front.card>
