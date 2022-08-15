@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="author">
                    <h5 class="title">Student <span class="text-info">{{ $student->name }}</span></h5>
                </div>
                <p class="description">Birth date: {{$student->birth_date}}</p>
                <p>student description</p>
                <p>Class year: {{ $student->class_year}}</p>
                <h6>School: <a class="text-info" href="{{ url("school/$school->id") }}">{{ $school->name }}</a></h6>
                <div class="text-right">
                    <a href="{{ url("student/$student->id/edit") }}"><button class="btn btn-primary">Edit info</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
