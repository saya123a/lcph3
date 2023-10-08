<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receiver;

class ReceiverController extends Controller
{
    public function getreceivers()
    {
        $receivers = Receiver::all(); // Retrieve all receiver details from the database

        return view('home', compact('receivers'));
    }
}
