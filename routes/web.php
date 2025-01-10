<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;

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
    return view('welcome');
});

Route::get('/', [StudentController::class, 'index'])->name('index');
Route::get('add-student', [StudentController::class, 'add_student'])->name('add_student');
Route::post('add-student', [StudentController::class, 'student_post'])->name('student_post');
Route::get('edit-student/{id}', [StudentController::class, 'edit_student'])->name('edit_student');
Route::post('edit-user', [StudentController::class, 'edit_student_post'])->name('edit_student_post');
Route::get('show/{id}', [StudentController::class, 'show'])->name('show');
Route::delete('delete-user/{id}', [StudentController::class, 'destroy'])->name('student.destroy');


// Class
Route::get('class', [ClassController::class, 'index'])->name('class.index');
Route::get('add-class', [ClassController::class, 'add'])->name('class.add');
Route::post('add-class', [ClassController::class, 'add_class'])->name('add_class');
Route::get('edit-class/{id}', [ClassController::class, 'edit_class'])->name('edit_class');
Route::post('edit-class', [ClassController::class, 'edit_class_post'])->name('edit.class');
Route::delete('delete-class/{id}', [ClassController::class, 'destroy'])->name('class.destroy');

