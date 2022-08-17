@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Teachers Table</h4>
                    </div>
                    <div class="card-body">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Teacher name</th>
                                <th>Birth_date</th>
                                </thead>
                                <tbody>
                                @foreach($teachers as $teacher)
                                    <tr>
                                        <th>{{ $teacher->name }}</th>
                                        <th>{{ $teacher->birth_date }}</th>
                                        <th class="text-right"><a href="teacher/{{$teacher->id}}">Show Detiles</a> <a class="pl-2 ml-2 border-left" href="teacher/{{$teacher->id}}/edit">Edit</a></th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        <div>
                            {{ $teachers->links() }}
                        </div>
                        <div class="text-right">
                            <a href="{{ url('teacher/create') }}"><button class="btn btn-primary">Add New teacher</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

