<?php /** @noinspection ALL */

    namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{


    public function __construct()
    {
        $this->authorizeResource(School::class, 'school');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::simplePaginate(10);
        return view('school.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $school = new School;
       return view('school.create_edit',compact('school'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolRequest $request)
    {
        School::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);
        return redirect('school');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        $labels = [];
        $data = [];
        $subjects = DB::table('subjects')
            ->join('subject_teacher','subjects.id','=','subject_teacher.subject_id')
            ->join('school_teacher','school_teacher.teacher_id','=','subject_teacher.teacher_id')
            ->join('student_subject','subjects.id','=','student_subject.subject_id')
            ->where('school_teacher.school_id', '=' , $school->id)
            ->select('subjects.id','subjects.name')
            ->selectRaw('count(student_subject.student_id) as student_count')
            ->groupBy('subjects.id')
            ->get();

        foreach ($subjects as $subject){
                    array_push($labels,$subject->name);
                    array_push($data,$subject->student_count);
        };
        return view('school.show',compact('school','labels','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('school.create_edit',compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(SchoolRequest $request,School $school)
    {
        $school->update([
            'name' => $request->name,
            'address' => $request->address
        ]);


        return redirect("school/$school->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $school->delete();
        return redirect('school');
    }
}
