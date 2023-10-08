<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Receiver;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $receivers = Receiver::all(); // Retrieve all receiver details from the database

        return view('checkout', compact('receivers'));
    }
}
