@extends('back.layouts.master')


@section('content')
    <x-back.container>
        <x-back.card>
            <x-back.form routeName="{{route('admin.products.store')}}" hasFile>
                <x-back.input
                    inputId="title"
                    inputName="title"
                    labelText="Title"
                />
                <x-back.input
                    inputId="slug"
                    inputName="slug"
                    labelText="Slug"
                    inputType="slug"
                    data-slugger-selector="#title"
                    data-slugger-url="{{route('admin.slugs.products.make_content')}}"
                />
                <x-back.input
                    inputId="sku"
                    inputName="sku"
                    labelText="Sku"
                />
                <x-back.input
                    inputId="price"
                    inputName="price"
                    labelText="Price"
                />
                <x-back.input
                    inputId="stock"
                    inputName="stock"
                    labelText="Stock"
                />
                <x-back.input
                    inputId="max_order"
                    inputName="max_order"
                    labelText="Max Order"
                />
                <x-back.input
                    inputId="image_desktop"
                    inputName="image_desktop"
                    labelText="Image Desktop (1 MB)"
                    inputType="file"
                    sizeLg="12"
                />
                <x-back.input
                    inputId="image_mobile"
                    inputName="image_mobile"
                    labelText="Image Mobile (1 MB)"
                    inputType="file"
                    sizeLg="12"

                />
                <x-back.textarea
                    inputId="brief_content"
                    inputName="brief_content"
                    labelText="Brief Content"
                    :editor-name="null"
                />
                <x-back.textarea
                    inputId="content"
                    inputName="content"
                    labelText="Content"
                />
                <x-slot:submitButtonSlot>
                    <button class="btn btn-primary">
                        Create Product
                    </button>
                </x-slot:submitButtonSlot>
            </x-back.form>
        </x-back.card>
    </x-back.container>
@endsection



