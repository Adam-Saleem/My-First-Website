@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="col-sm-9 col-lg-6 my-3">
            <h1>Forget Password</h1>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
        </div>
        <div class="col-sm-9 col-lg-6 my-3">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

            <!-- Email Address -->
                <div>
                    <label for="email" :value="__('Email')"></label>
                    <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                           autofocus/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button>
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
                <div class="my-1">
                    @include('Layouts.errors')
                </div>
            </form>
        </div>
    </div>
@endsection
