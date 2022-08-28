<?php /** @noinspection ALL */

    namespace App\Http\Controllers;

    use App\Http\Requests\StudentRequest;
    use App\Models\School;
    use App\Models\Student;
    use Illuminate\Contracts\Foundation\Application;


    class StudentController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */
        public function index()
        {
            $students = Student::simplePaginate(10);
            return view('student.index', compact('students'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
         */
        public function create()
        {

            $student = new Student();
            return view('student.create_edit', compact( 'student'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
         */
        public function store(StudentRequest $request)
        {
//        $fileName = $request->file('image')->getClientOriginalName();
//        $NewPath = "/student-images/$request->name";
//        $request->file('image')->move(public_path($NewPath),$fileName);
            $student = Student::create([
                'name' => $request->name,
                'birth_date' => $request->birth_date,
                'class_year' => $request->class_year,
                'school_id' => $request->school_id,
            ]);
            $student->addMedia($request->file('image'))->toMediaCollection('images');
            return redirect('student');
        }

        /**
         * Display the specified resource.
         *
         * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
         */
        public function show(student $student)
        {
            //$media = $student->getFirstMedia('images');
            //$media = $student->getFirstMediaUrl('images');

            $media = $student->getFirstMediaUrl('images');
            $school = $student->school;
            return view('student.show', compact('student', 'school','media'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
         */
        public function edit(student $student)
        {
            return view('student.create_edit', compact('student'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
         */
        public function update(StudentRequest $request, student $student)
        {
            $fileName = $request->file('image')->getClientOriginalName();
            $NewPath = "/student-images/$request->name";
            $request->file('image')->move(public_path($NewPath), $fileName);

            $student->update([
                'name' => $request->name,
                'birth_date' => $request->birth_date,
                'class_year' => $request->class_year,
                'school_id' => $request->school_id,
                'image' => "$NewPath/$fileName"
            ]);

            return redirect("student/$student->id");
        }

        /**
         * Remove the specified resource from storage.
         *
         * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
         */
        public function destroy(Student $student)
        {
            $student->delete();
            return redirect('student');
        }
    }
