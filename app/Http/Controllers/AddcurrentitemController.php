<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addcurrentitem;

class AddcurrentitemController extends Controller
{
    public function addcurrentitem()
    {
        return view('addcurrentitem');
    }
}
