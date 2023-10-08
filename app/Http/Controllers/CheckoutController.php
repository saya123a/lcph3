<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;

class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }
}
