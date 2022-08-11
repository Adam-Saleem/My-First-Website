@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="col-sm-9 col-lg-6 my-3">
            <h1>Register</h1>
            <form method="POST" action="{{route('register')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Password confirmed:</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <a class="text-decoration-none float-right mt-3" href="{{ route('/login') }}">Already have account</a>

                </div>
                <div class="my-1">
                    @include('Layouts.errors')
                </div>
            </form>

        </div>
    </div>

@endsection
