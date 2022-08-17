@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="author text-center">
                    <h5 class="title ">{{$subject->name}}</h5>
                </div>
                <div>
                    <p>Description about :<span class="text-info">{{$subject->name}}</span></p>
                    <h4>{{$subject->description}}</h4>
                </div>
                <div class="text-right">
                    <a href="{{ url("subject/$subject->id/edit") }}"><button class="btn btn-primary">Edit info</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
