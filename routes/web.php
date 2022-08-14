<?php

    use App\Http\Controllers\SchoolController;
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

Route::get('/', function () {
    return view('home');
});

Route::resource('school',SchoolController::class);

Route::resource('teacher', TeacherController::class);

Route::resource('teacher', TeacherController::class);
    Route::resource('teacher', TeacherController::class);



require __DIR__.'/auth.php';
