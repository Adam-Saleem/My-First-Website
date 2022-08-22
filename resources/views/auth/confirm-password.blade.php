@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="col-sm-9 col-lg-6 my-3">
            <h1>Confirm Password</h1>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <div class="col-sm-9 col-lg-6 my-3">

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password -->
                    <div>
                        <label for="password" :value="__('Password')"></label>
                        <input id="password" class="block mt-1 w-full"
                               type="password"
                               name="password"
                               required autocomplete="current-password"/>
                    </div>

                    <div class="flex justify-end mt-4">
                        <button>
                            {{ __('Confirm') }}
                        </button>
                        <div class="my-1">
                            @include('Layouts.errors')
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
