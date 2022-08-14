@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="card card-user">
            <div class="card-header">
                @if( $teacher->exists)
                    <h5 class="card-title">Edit <span class="text-info">{{ $teacher->name }}</span> Record </h5>
                @else
                    <h5 class="card-title">Add New teacher</h5>
                @endif
            </div>
            <div class="card-body">
                @if( $teacher->exists)
                    <form method="POST" action="{{ url("teacher/$teacher->id") }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                @else
                    <form method="POST" action="{{ url("teacher") }}">
                        {{ csrf_field() }}
                @endif
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $teacher->exists?$teacher->name:old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Birth_date</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $teacher->exists?$teacher->birth_date:old('birth_date') }}">
                    </div>
                    <div class="mb-3 text-right">
                            <button type="submit" class="btn btn-primary">{{ $teacher->exists?'Update':'Add new Teacher'}}</button>
                      </div>
                    <div>
                        @include('layouts.errors')
                    </div>
                </form>
                @if( $teacher->exists)
                    <form method="POST" action="{{ url("teacher/{$teacher->id}") }}">
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

