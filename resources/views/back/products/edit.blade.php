@extends('back.layouts.master')


@section('content')
    <x-back.container>
        <x-back.card>
            <x-back.form routeName="{{route('admin.products.update',$product->id)}}">
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
                />
                <x-back.input
                    inputId="image"
                    inputName="image"
                    labelText="Image"
                    inputType="file"
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
