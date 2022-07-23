<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
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

//USER ROUTES
Route::resource('users', UsersController::class);
Route::get('delete/users/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('del_user');


//SETTINGS ROUTES
Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings');