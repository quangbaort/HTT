<?php

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
Route::middleware('userLogin')->group(function () {
    Route::post('/loginPost' , [\App\Http\Controllers\AuthController::class , 'loginPost'])->name('loginPost');
    Route::get('/login' , [App\Http\Controllers\AuthController::class , 'index'])->name('userLogin');
});
Route::middleware('userLogined')->group(function () {
    Route::get('/home' , [App\Http\Controllers\HomeController::class , 'index'] )->name('home');
});
Route::middleware('Admin')->prefix('admin')->group(function () {
    Route::get('dashboard' , [App\Http\Controllers\Admin\HomeController::class , 'dashboard'])->name('dashboard');
    Route::get('users' , [App\Http\Controllers\Admin\UserController::class , 'index'])->name('users');
    Route::post('add-user' ,[App\Http\Controllers\Admin\UserController::class , 'addUser'])->name('add-user');
});
