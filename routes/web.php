<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\AssiduitesController;
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
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('staffs', StaffController::class);
Route::resource('campus', CampusController::class);
Route::resource('classes', ClassesController::class);
Route::resource('courses', CoursesController::class);
Route::resource('subjects', SubjectsController::class);
Route::resource('assiduites', AssiduitesController::class);

//settings ROUTES
Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings');

//Tickets ROUTES
Route::resource('plannings', PlanningsController::class);

//Tickets ROUTES
Route::resource('tickets', TicketsController::class);

//Marks ROUTES
Route::resource('marks', MarksController::class);

//USER ROUTES
Route::resource('users', UsersController::class);
Route::get('delete/users/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('del_user');

//STUDENTS ROUTES
Route::resource('students', StudentController::class);
Route::get('students/{id}/delete', [App\Http\Controllers\StudentController::class, 'destroy'])->name('del_student');
Route::patch('/users/update/{id}', [App\Http\Controllers\StudentController::class, 'updateUser'])->name('userUpdate');

//SETTINGS ROUTES
Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings');
