<x-front.card>
    <div class="row">
        <div class="col-12 col-md-3">
            <img src="{{$product->defaultImage?->url}}" alt="Product Image">
        </div>
        <div class="col-12 col-md-7">
            <h4>{{$product->title}}</h4>
            <p>{{$product->brief_content}}</p>
        </div>
        <div class="col-12 col-md-2">
            <x-front.form routeName="#">
                <x-slot:submitButtonSlot>
                    <x-front.button>
                        Add to Cart <i class="bi bi-plus-circle"></i>
                    </x-front.button>
                </x-slot:submitButtonSlot>
            </x-front.form>
        </div>
    </div>
</x-front.card>
