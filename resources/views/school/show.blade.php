@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="author text-center">
                    <h5 class="title ">{{$school->name}}</h5>
                    <p class="description">{{$school->address}}</p>
                </div>
                <p>
                    school description
                </p>

                <div class="text-right">
                    <a href="{{ url("school/edit/$school->id")}}"><button class="btn btn-primary">Edit info</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
