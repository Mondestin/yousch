<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CoursesController;
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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::resource('users', UsersController::class);
Route::resource('staffs', StaffController::class);
Route::resource('campus', CampusController::class);
Route::resource('classes', ClassesController::class);
Route::resource('courses', CoursesController::class);
Route::resource('subjects', SubjectsController::class);
Route::resource('assiduites', AssiduitesController::class);

Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings');
