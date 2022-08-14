@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="author">
                    <h5 class="title">Teacher <span class="text-info">{{ $teacher->name }}</span></h5>

                </div>
                <p class="description">Birth date: {{$teacher->birth_date}}</p>
                <p>
                    teacher description
                </p>

                <div class="text-right">
                    <a href="{{ url("teacher/$teacher->id/edit") }}"><button class="btn btn-primary">Edit info</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
