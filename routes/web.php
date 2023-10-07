<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddnewitemController;
use App\Http\Controllers\AddcurrentitemController;

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
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::post('/home', [HomeController::class, 'homes'])->name('homes');
    Route::get('/home/{item}/edit', [HomeController::class, 'edit'])->name('edit');
    Route::put('/home/{item}/update', [HomeController::class, 'update'])->name('update');
    Route::delete('/home/{item}/delete', [HomeController::class, 'delete'])->name('delete');
    Route::get('/addnewitem', [AddnewitemController::class, 'addnewitem'])->name('addnewitem');
    Route::post('/addnewitem', [AddnewitemController::class, 'addnewitems'])->name('addnewitems');
    Route::get('/addcurrentitem', [AddcurrentitemController::class, 'addcurrentitem'])->name('addcurrentitem');
    Route::post('/addcurrentitem', [AddcurrentitemController::class, 'addcurrentitems'])->name('addcurrentitems');
    
    // Add more protected routes as needed
});
