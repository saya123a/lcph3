<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddnewitemController;
use App\Http\Controllers\LoginController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

Route::get('/', [LoginController::class, 'login'])->name('lcph.login');
/*
Route::get('/addnewitem', [AddnewitemController::class, 'addnewitem'])->name('addnewitem');
Route::post('/addnewitem', [AddnewitemController::class, 'addnewitems'])->name('addnewitems');
Route::get('/addnewitem/{item}/edit', [AddnewitemController::class, 'edit'])->name('edit');
Route::put('/addnewitem/{item}/update', [AddnewitemController::class, 'update'])->name('update');
Route::delete('/addnewitem/{item}/delete', [AddnewitemController::class, 'delete'])->name('delete');
*/
