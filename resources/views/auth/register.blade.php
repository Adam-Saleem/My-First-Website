@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="col-sm-9 col-lg-6 my-3">
            <h1>Register</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div>
                    <label for="name" :value="__('Name')" ></label>
                    <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <label for="email" :value="__('Email')"></label>
                    <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" :value="__('Password')" ></label>
                    <input id="password" class="block mt-1 w-full"
                             type="password"
                             name="password"
                             required autocomplete="new-password" />
                </div>
                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation" :value="__('Confirm Password')"></label>
                    <input id="password_confirmation" class="block mt-1 w-full"
                             type="password"
                             name="password_confirmation" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button class="ml-4">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
