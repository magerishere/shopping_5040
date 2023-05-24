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
                    inputId="image_desktop"
                    inputName="image_desktop"
                    labelText="Image Desktop (1 MB)"
                    inputType="file"
                />
                <x-back.input
                    inputId="image_mobile"
                    inputName="image_mobile"
                    labelText="Image Mobile (1 MB)"
                    inputType="file"
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



