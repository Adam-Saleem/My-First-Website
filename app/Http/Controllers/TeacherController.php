<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    */
    public function index()
    {
        $teachers = Teacher::simplePaginate(10);
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
        return view('teacher.create_edit',compact('teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(teacherRequest $request)
    {
        $teacher = Teacher::create([
            'name' => $request->name,
            'birth_date' => $request->birth_date,
        ]);
        $teacher->schools()->attach($request->schools);
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
        return view('teacher.create_edit',compact('teacher'));
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

        $teacher->schools()->sync($request->schools);
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
