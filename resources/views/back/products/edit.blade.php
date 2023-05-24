@extends('back.layouts.master')


@section('content')
    <x-back.container>
        <x-back.card>
            <x-back.form routeName="{{route('admin.products.update',$product->id)}}" formMethod="PATCH" hasFile>
                <x-back.input
                    inputId="title"
                    inputName="title"
                    labelText="Title"
                    inputValue="{{$product->title}}"
                />
                <x-back.input
                    inputId="slug"
                    inputName="slug"
                    labelText="Slug"
                    inputValue="{{$product->slugContent}}"
                    inputType="slug"
                    data-slugger-selector="#title"
                    data-slugger-url="{{route('admin.slugs.products.make_content',$product->id)}}"
                />
                <x-back.input
                    inputId="sku"
                    inputName="sku"
                    labelText="Sku"
                    inputValue="{{$product->variation?->sku}}"
                />
                <x-back.input
                    inputId="price"
                    inputName="price"
                    labelText="Price"
                    inputValue="{{$product->variation?->price}}"
                />
                <x-back.input
                    inputId="stock"
                    inputName="stock"
                    labelText="Stock"
                    inputValue="{{$product->variation?->stock}}"
                />
                <x-back.input
                    inputId="max_order"
                    inputName="max_order"
                    labelText="Max Order"
                    inputValue="{{$product->variation?->max_order}}"
                />
                <x-back.input
                    inputId="image_desktop"
                    inputName="image_desktop"
                    labelText="Image Desktop (1 MB)"
                    inputType="file"
                    inputValue="{{$product->getFirstMediaUrl(\App\Enums\ProductMediaCollection::DEFAULT)}}"
                />
                <x-back.input
                    inputId="image_mobile"
                    inputName="image_mobile"
                    labelText="Image Mobile (1 MB)"
                    inputType="file"
                    inputValue="{{$product->getFirstMediaUrl(\App\Enums\ProductMediaCollection::MOBILE)}}"
                />
                <x-back.textarea
                    inputId="brief_content"
                    inputName="brief_content"
                    labelText="Brief Content"
                    :editor-name="null"
                    inputValue="{{$product->brief_content}}"
                />
                <x-back.textarea
                    inputId="content"
                    inputName="content"
                    labelText="Content"
                    inputValue="{{$product->content}}"
                />
                <x-slot:submitButtonSlot>
                    <button class="btn btn-primary">
                        Update Product
                    </button>
                </x-slot:submitButtonSlot>
            </x-back.form>
        </x-back.card>
    </x-back.container>
@endsection
