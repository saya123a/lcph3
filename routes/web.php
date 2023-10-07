<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddnewitemController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth.check'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/addnewitem', [AddnewitemController::class, 'addnewitem'])->name('addnewitem');
    Route::post('/addnewitem', [AddnewitemController::class, 'addnewitems'])->name('addnewitems');
    Route::get('/addnewitem/{item}/edit', [AddnewitemController::class, 'edit'])->name('edit');
    Route::put('/addnewitem/{item}/update', [AddnewitemController::class, 'update'])->name('update');
    Route::delete('/addnewitem/{item}/delete', [AddnewitemController::class, 'delete'])->name('delete');
    // Add more protected routes as needed
});





