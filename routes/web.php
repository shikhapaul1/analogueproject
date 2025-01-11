<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;

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

// Class
Route::get('class', [ClassController::class, 'index'])->name('class.index');
Route::get('add-class', [ClassController::class, 'add'])->name('class.add');
Route::post('add-class', [ClassController::class, 'store'])->name('class.store');
Route::get('class-edit/{id}', [ClassController::class, 'edit'])->name('class.edit');
Route::post('class-edit', [ClassController::class, 'edit_post'])->name('class.edit.post');
Route::delete('delete-class/{id}', [ClassController::class, 'delete'])->name('class.delete');


// Student
Route::get('student', [StudentController::class, 'index'])->name('student.index');
Route::get('add-student', [StudentController::class, 'add'])->name('student.add');
Route::post('add-student', [StudentController::class, 'store'])->name('student.store');
Route::get('edit-student/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('edit-student', [StudentController::class, 'edit_store'])->name('student.edit.store');
Route::get('view-student/{id}', [StudentController::class, 'view_store'])->name('student.view');
Route::delete('delete-student/{id}', [StudentController::class, 'delete'])->name('student.delete');