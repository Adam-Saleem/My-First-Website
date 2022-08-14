@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Add New School</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url("school") }}">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input class="form-control" id="address" name="address"  required></input>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add School</button>
                    </div>
                    <div>
                        @include('layouts.errors')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

