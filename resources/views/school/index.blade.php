@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Schools Table</h4>
                    </div>
                    <div class="card-body">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>School name</th>
                                <th>Address</th>
                                </thead>
                                <tbody>
                                @foreach($schools as $school)
                                    <tr>
                                        <th>{{ $school->name }}</th>
                                        <th>{{ $school->address }}</th>
                                        <th class="text-right"><a href="school/{{$school->id}}">Show Detiles</a> <a class="pl-2 ml-2 border-left" href="school/{{$school->id}}/edit">Edit</a></th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        <div>
                            {{ $schools->links() }}
                        </div>
                        <div class="text-right">
                            <a href="{{ url('school/create') }}"><button class="btn btn-primary">Add New School</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

