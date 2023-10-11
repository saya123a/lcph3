<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReceiverController;
use App\Http\Controllers\CheckoutController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
 

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

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    
    /**Route::post('/home', [HomeController::class, 'homes'])->name('homes');
    Route::get('/home/{item}/edit', [HomeController::class, 'edit'])->name('edit');
    Route::put('/home/{item}/update', [HomeController::class, 'update'])->name('update');
    Route::delete('/home/{item}/delete', [HomeController::class, 'delete'])->name('delete');**/
    
    Route::get('/addnewitem', [ItemController::class, 'addnewitem'])->name('addnewitem');
    Route::post('/addnewitem', [ItemController::class, 'addnewitems'])->name('addnewitems');
    Route::get('/addcurrentitem', [ItemController::class, 'addcurrentitem'])->name('addcurrentitem');
    Route::post('/addcurrentitem', [ItemController::class, 'addcurrentitems'])->name('addcurrentitems');
    Route::get('/deletecurrentitem', [ItemController::class, 'deletecurrentitem'])->name('deletecurrentitem');
    Route::post('/deletecurrentitem', [ItemController::class, 'deletecurrentitems'])->name('deletecurrentitems');
    Route::get('/addnewreceiver', [ReceiverController::class, 'addnewreceiver'])->name('addnewreceiver');
    Route::post('/addnewreceiver', [ReceiverController::class, 'addnewreceivers'])->name('addnewreceivers');
    Route::get('/deletecurrentreceiver', [ReceiverController::class, 'deletecurrentreceiver'])->name('deletecurrentreceiver');
    Route::post('/deletecurrentreceiver', [ReceiverController::class, 'deletecurrentreceivers'])->name('deletecurrentreceivers');
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'checkouts'])->name('checkouts');

    // Add more protected routes as needed
});
