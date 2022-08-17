@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="card card-user">
            <div class="card-header">
                @if( $subject->exists)
                    <h5 class="card-title">Edit <span class="text-info">{{ $subject->name }}</span> Record</h5>
                @else
                    <h5 class="card-title">Add New Subject</h5>
                @endif
            </div>
            <div class="card-body">
                @if( $subject->exists)
                    <form method="POST" action="{{ url("subject/$subject->id") }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                @else
                    <form method="POST" action="{{ url("subject") }}">
                        {{ csrf_field() }}
                @endif
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $subject->exists?$subject->name:old('name') }}" >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input class="form-control" id="description" name="description" value="{{ $subject->exists?$subject->description:old('description') }}">
                    </div>
                    <div class="mb-3 text-right">
                            <button type="submit" class="btn btn-primary">{{ $subject->exists?'Update':'Add Subject'}}</button>
                      </div>
                    <div>
                        @include('layouts.errors')
                    </div>
                </form>
                @if( $subject->exists)
                    <form method="POST" action="{{ url("subject/{$subject->id}") }}">
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

