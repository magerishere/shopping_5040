@extends('back.layouts.master')

@section('content')
    <x-back.container>
        <x-back.card>
            <h5 class="card-title text-center">
                Admin Login
            </h5>
            <x-back.form routeName="{{route('admin.login')}}">
                <x-back.email-input
                    inputId="email"
                    inputName="email"
                    labelText="Email"
                    sizeLg="12"
                />
                <x-back.password-input
                    inputId="password"
                    inputName="password"
                    labelText="Password"
                    sizeLg="12"
                />

                <x-slot:submitButtonSlot>
                    <x-back.button>
                        Login To Dashboard
                    </x-back.button>
                </x-slot:submitButtonSlot>
            </x-back.form>
        </x-back.card>
    </x-back.container>
@endsection
