<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receiver;

class ReceiverController extends Controller
{
    public function addnewitem()
    {
        $items = Addnewitem::all();
        return view('addnewitem', ['items' => $items]);
    }
}
