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
