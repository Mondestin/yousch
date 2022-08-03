<?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\AssiduitesController;

=======
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StudentController;
>>>>>>> e19bcdabde31c9174269652d945e9d8c56c6b0b4
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
<<<<<<< HEAD
    return view('welcome');
=======
    return view('auth.login');
>>>>>>> e19bcdabde31c9174269652d945e9d8c56c6b0b4
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<<<<<<< HEAD

Auth::routes();

Route::resource('users', UsersController::class);
Route::resource('staffs', StaffController::class);
Route::resource('campus', CampusController::class);
Route::resource('classes', ClassesController::class);
Route::resource('courses', CoursesController::class);
Route::resource('subjects', SubjectsController::class);
Route::resource('assiduites', AssiduitesController::class);

Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings');
=======
Auth::routes();

//USER ROUTES
Route::resource('users', UsersController::class);
Route::get('delete/users/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('del_user');

//STUDENTS ROUTES
Route::resource('students', StudentController::class);

//SETTINGS ROUTES
Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings');
>>>>>>> e19bcdabde31c9174269652d945e9d8c56c6b0b4
