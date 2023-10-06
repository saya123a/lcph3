<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddnewitemController;
use App\Http\Controllers\LoginpageController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/addnewitem', [AddnewitemController::class, 'addnewitem'])->name('addnewitem');
Route::post('/addnewitem', [AddnewitemController::class, 'addnewitems'])->name('addnewitems');
Route::get('/addnewitem/{item}/edit', [AddnewitemController::class, 'edit'])->name('edit');
Route::put('/addnewitem/{item}/update', [AddnewitemController::class, 'update'])->name('update');
Route::delete('/addnewitem/{item}/delete', [AddnewitemController::class, 'delete'])->name('delete');
*/

Route::get('/', [LoginpageController::class, 'loginform'])->name('loginform');
Route::post('/loginpage', [LoginpageController::class, 'login'])->name('login');
Route::get('/loginpage', [LoginpageController::class, 'signupform'])->name('signupform');
Route::post('/loginpage', [LoginpageController::class, 'signup'])->name('signup');

// These routes are part of Laravel's authentication scaffolding
Auth::routes();

// This route is for the homepage and protected by the 'auth' middleware
Route::get('/homepage', [HomepageController::class, 'homepage'])->middleware('auth');

// Password reset routes
Route::get('/forgot-password', [ResetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

