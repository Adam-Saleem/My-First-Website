@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Students Table</h4>
                    </div>
                    <div class="card-body">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Student name</th>
                                <th>Birth date</th>
                                <th>Class year</th>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <th>{{ $student->name }}</th>
                                        <th>{{ $student->birth_date }}</th>
                                        <th>{{ $student->class_year }}</th>
                                        <th class="text-right"><a href="student/{{$student->id}}">Show Detiles</a> <a class="pl-2 ml-2 border-left" href="student/{{$student->id}}/edit">Edit</a></th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        <div class="text-right">
                            <a href="{{ url('student/create') }}"><button class="btn btn-primary">Add New student</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

