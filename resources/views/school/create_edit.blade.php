@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="card card-user">
            <div class="card-header">
                @if( isset($school))
                    <h5 class="card-title">Edit {{ $school->name }} </h5>
                @else
                    <h5 class="card-title">Add New School</h5>
                @endif
            </div>
            <div class="card-body">
                @if( isset($school))
                    <form method="POST" action="{{ url("school/$school->id") }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                @else
                    <form method="POST" action="{{ url("school") }}">
                        {{ csrf_field() }}
                @endif
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               @if( isset($school))
                                   value="{{ $school->name }}"
                               @endif
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input class="form-control" id="address" name="address"
                               @if( isset($school))
                                   value="{{ $school->address }}"
                               @endif
                               required></input>
                    </div>
                    <div class="mb-3 text-right">
                        @if( isset($school))
                            <button type="submit" class="btn btn-primary">Update</button>
                        @else
                            <button type="submit" class="btn btn-primary">Add School</button>
                        @endif
                      </div>
                    <div>
                        @include('layouts.errors')
                    </div>
                </form>
                @if( isset($school))
                    <form method="POST" action="{{ url("school/{$school->id}") }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="mb-3 text-right">
                            <button type="submit" class="btn btn-danger">Delete recorde</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection

