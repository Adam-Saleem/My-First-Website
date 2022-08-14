@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="card card-user">
            <div class="card-header">
                @if( $school->exists)
                    <h5 class="card-title">Edit <span class="text-info">{{ $school->name }}</span> Record</h5>
                @else
                    <h5 class="card-title">Add New School</h5>
                @endif
            </div>
            <div class="card-body">
                @if( $school->exists)
                    <form method="POST" action="{{ url("school/$school->id") }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                @else
                    <form method="POST" action="{{ url("school") }}">
                        {{ csrf_field() }}
                @endif
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $school->exists?$school->name:old('name') }}" >
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input class="form-control" id="address" name="address" value="{{ $school->exists?$school->address:old('address') }}">
                    </div>
                    <div class="mb-3 text-right">
                            <button type="submit" class="btn btn-primary">{{ $school->exists?'Update':'Add School'}}</button>
                      </div>
                    <div>
                        @include('layouts.errors')
                    </div>
                </form>
                @if( $school->exists)
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

