@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Subjects Table</h4>
                    </div>
                    <div class="card-body">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Subject name</th>
                                <th>Description</th>
                                </thead>
                                <tbody>
                                @foreach($subjects as $subject)
                                    <tr>
                                        <th>{{ $subject->name }}</th>
                                        <th>{{ $subject->description }}</th>
                                        <th class="text-right"><a href="subject/{{$subject->id}}">Show Detiles</a> <a class="pl-2 ml-2 border-left" href="subject/{{$subject->id}}/edit">Edit</a></th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        <div class="text-right">
                            <a href="{{ url('subject/create') }}"><button class="btn btn-primary">Add New Subject</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

