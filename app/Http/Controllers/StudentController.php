<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::simplePaginate(10);
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();
        $student = new Student();
        return view('student.create_edit' ,compact('schools', 'student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        Student::create([
            'name' => $request->name,
            'birth_date' => $request->birth_date,
            'class_year' => $request->class_year,
            'school_id' => $request->school_id
            ]);
        return redirect('student');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        $school = $student->school;
        return view('student.show',compact('student', 'school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        $schools = School::all();
        return view('student.create_edit',compact('student','schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request,student $student)
    {
        $student->update([
            'name' => $request->name,
            'birth_date' => $request->birth_date,
            'class_year' => $request->class_year,
            'school_id' => $request->school_id
        ]);

        return redirect("student/$student->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('student');
    }
}
