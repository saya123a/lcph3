<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addcurrentitem;

class AddcurentitemController extends Controller
{
    public function addcurrentitem()
    {
        return view('addcurrentitem');
    }
}
