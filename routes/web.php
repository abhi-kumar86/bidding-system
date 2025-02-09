<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;

// Routes for StudentController
Route::get('/students', [StudentController::class, 'index'])->name('students.index'); // List all students
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create'); // Show form to create a new student
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show'); // Show details of a specific student
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit'); // Show form to edit a student

Route::get('/student/{id}', [StudentController::class, 'homepage']);
Route::get('/studentview', [StudentController::class, 'index']);
Route::resource('category', CategoryController::class)->middleware('auth');

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

// Route::get('/', function () {
//     return view('welcome');
// // });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/welcome', [AdminController::class, 'usercheck'])->middleware('auth', 'admin');
