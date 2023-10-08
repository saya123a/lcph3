<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReceiverController;
use App\Http\Controllers\AddnewitemController;
use App\Http\Controllers\AddcurrentitemController;
use App\Http\Controllers\DeletecurrentitemController;
use App\Http\Controllers\AddnewreceiverController;
use App\Http\Controllers\DeletecurrentreceiverController;
use App\Http\Controllers\CheckoutController;

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
    Route::get('/home', [ReceiverController::class, 'getreceivers'])->name('getreceivers');;

    /**Route::post('/home', [HomeController::class, 'homes'])->name('homes');
    Route::get('/home/{item}/edit', [HomeController::class, 'edit'])->name('edit');
    Route::put('/home/{item}/update', [HomeController::class, 'update'])->name('update');
    Route::delete('/home/{item}/delete', [HomeController::class, 'delete'])->name('delete');**/
    
    Route::get('/addnewitem', [AddnewitemController::class, 'addnewitem'])->name('addnewitem');
    Route::post('/addnewitem', [AddnewitemController::class, 'addnewitems'])->name('addnewitems');
    Route::get('/addcurrentitem', [AddcurrentitemController::class, 'addcurrentitem'])->name('addcurrentitem');
    Route::post('/addcurrentitem', [AddcurrentitemController::class, 'addcurrentitems'])->name('addcurrentitems');
    Route::get('/deletecurrentitem', [DeletecurrentitemController::class, 'deletecurrentitem'])->name('deletecurrentitem');
    Route::post('/deletecurrentitem', [DeletecurrentitemController::class, 'deletecurrentitems'])->name('deletecurrentitems');
    Route::get('/addnewreceiver', [AddnewreceiverController::class, 'addnewreceiver'])->name('addnewreceiver');
    Route::post('/addnewreceiver', [AddnewreceiverController::class, 'addnewreceivers'])->name('addnewreceivers');
    Route::get('/deletecurrentreceiver', [DeletecurrentreceiverController::class, 'deletecurrentreceiver'])->name('deletecurrentreceiver');
    Route::post('/deletecurrentreceiver', [DeletecurrentreceiverController::class, 'deletecurrentreceivers'])->name('deletecurrentreceivers');
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'checkouts'])->name('checkouts');

    // Add more protected routes as needed
});
