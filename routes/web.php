<?php

    use App\Http\Controllers\SchoolController;
    use App\Http\Controllers\SchoolTeacherController;
    use App\Http\Controllers\TeacherController;
    use App\Http\Controllers\StudentController;
    use App\Http\Controllers\SubjectController;

    use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    Route::get('foo', function () {

        dd(\App\Models\Teacher::find(3)->schools()->toSql());
    });

Route::get('/', function () {
    return view('home');
});

Route::resource('school',SchoolController::class);

Route::resource('teacher', TeacherController::class);

Route::resource('school.teacher', SchoolTeacherController::class);

Route::resource('student', StudentController::class);

Route::resource('subject', SubjectController::class);



require __DIR__.'/auth.php';
