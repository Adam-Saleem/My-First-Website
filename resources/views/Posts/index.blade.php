@extends('Layouts.layout')

@section('contact')
    @if (Auth::check())
        <div class="content">
            <p>You are login</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <button type="submit" class="btn btn-primary">Logout</button>
            </form>


        </div>

    @else
    <div class="content">
        <div class="mb-3">
            <p>Login or create a new account.</p>
        </div>
        <div class="mb-3">
            <a href="{{ route('login') }}">
                <button type="submit" class="btn btn-primary">Login</button>
            </a>
            <a href="{{ route('register') }}">
                <button type="submit" class="btn btn-primary">Register</button>
            </a>
        </div>
    </div>
    @endif
@endsection
