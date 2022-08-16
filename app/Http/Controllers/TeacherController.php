<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\School;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::latest()->get();
        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = new Teacher;
        $schools = School::all();
        return view('teacher.create_edit',compact('teacher','schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(teacherRequest $request)
    {
        Teacher::create([
            'name' => $request->name,
            'birth_date' => $request->birth_date,
        ]);

        $schools = School::findOrFail($request->schools);
        $teacher = Teacher::get()->last();
        $teacher->schools()->attach($schools);

        return redirect('teacher');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(teacher $teacher)
    {
        return view('teacher.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(teacher $teacher)
    {
        $schools = School::all();
        return view('teacher.create_edit',compact('teacher','schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request,teacher $teacher)
    {
        $teacher->update([
            'name' => $request->name,
            'birth_date' => $request->birth_date
        ]);

        $schools = School::findOrFail($request->schools);
        $teacher->schools()->sync($schools);

        return redirect("teacher/$teacher->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect('teacher');
    }
}
