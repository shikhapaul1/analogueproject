<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('add-user', [UserController::class, 'add_user'])->name('add_user');
Route::post('/', [UserController::class, 'post'])->name('post');
Route::get('edit-user/{id}', [UserController::class, 'edit_user'])->name('edit_user');
Route::post('edit-user', [UserController::class, 'edit_user_post'])->name('edit_user_post');
Route::get('delete-user/{id}', [UserController::class, 'delete'])->name('delete');
