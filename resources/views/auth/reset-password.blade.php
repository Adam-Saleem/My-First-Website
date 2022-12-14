@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="col-sm-9 col-lg-6 my-3">
            <h1>Reset Password</h1>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <!-- Email Address -->
                <div>
                    <label for="email" :value="__('Email')"></label>
                    <input id="email" class="block mt-1 w-full" type="email" name="email"
                           :value="old('email', $request->email)" required autofocus/>
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <label for="password" :value="__('Password')"></label>
                    <input id="password" class="block mt-1 w-full" type="password" name="password" required/>
                </div>
                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation" :value="__('Confirm Password')"></label>
                    <input id="password_confirmation" class="block mt-1 w-full"
                           type="password"
                           name="password_confirmation" required/>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <button>
                        {{ __('Reset Password') }}
                    </button>
                </div>
                <div class="my-1">
                    @include('Layouts.errors')
                </div>
            </form>
        </div>
    </div>
@endsection
