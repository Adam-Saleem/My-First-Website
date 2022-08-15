@extends('Layouts.layout')

@section('contact')
    <div class="content">
        <div class="card card-user">
            <div class="card-header">
                @if( $student->exists)
                    <h5 class="card-title">Edit <span class="text-info">{{ $student->name }}</span> Record </h5>
                @else
                    <h5 class="card-title">Add New student</h5>
                @endif
            </div>
            <div class="card-body">
                @if($student->exists)
                    <form method="POST" action="{{ url("student/$student->id") }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                @else
                    <form method="POST" action="{{ url("student") }}">
                        {{ csrf_field() }}
                @endif
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $student->exists?$student->name:old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Birth_date</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $student->exists?$student->birth_date:old('birth') }}">
                    </div>
                    <div class="mb-3">
                        <label for="class_year" class="form-label">class_year</label>
                        <br>
                        <select class="custom-select ml-1 w-25" name="class_year" id="class_year">
                            <option class="text-secondary" selected disabled>Select Year</option>
                            @for($i=1;$i<=12;$i++)
                                @if ($i == $student->class_year)
                                    <option value="{{ $i }}" selected>{{ $i }}</option>
                                @else
                            <option value="{{ $i }}">{{ $i }}</option>
                                @endif
                            @endfor

                        </select>
                    </div>
                        <div class="mb-3">
                            <label for="school_id" class="form-label">School</label>
                            <br>
                            <select class="custom-select ml-1 w-25" name="school_id" id="school_id">
                                <option class="text-secondary" selected disabled>Select School</option>
                                @foreach($schools as $school )
                                    @if ($school->id == $student->school_id)
                                        <option value="{{ $school->id }}" selected>{{ $school->name }}</option>
                                    @else
                                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    <div class="mb-3 text-right">
                            <button type="submit" class="btn btn-primary">{{ $student->exists?'Update':'Add New Student'}}</button>
                      </div>
                    <div>
                        @include('layouts.errors')
                    </div>
                </form>
                @if($student->exists)
                    <form method="POST" action="{{ url("student/{$student->id}") }}">
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

