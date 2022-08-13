<?php

    use App\Http\Controllers\SchoolController;
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
    return view('Posts.index');
});

Route::get('school', [SchoolController::class, 'index']);

Route::get('school/show/{id}', [SchoolController::class, 'show']);

Route::get('school/edit/{id}',[SchoolController::class , 'edit']);


require __DIR__.'/auth.php';
