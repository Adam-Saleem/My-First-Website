@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Edit {{ $school->name }} </h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url("school/$school->id") }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $school->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input class="form-control" id="address" name="address" value="{{ $school->address }}" required></input>
                    </div>
                    <div class="mb-3 text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <div>
                        @include('layouts.errors')
                    </div>
                </form>
                <form method="POST" action="{{ url("school/{$school->id}") }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="mb-3 text-right">
                        <button type="submit" class="btn btn-danger">Delete recorde</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

