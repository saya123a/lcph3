<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deletecurrentitem;

class DeletecurrentitemController extends Controller
{
    public function deletecurrentitem()
    {
        return view('deletecurrentitem');
    }
}
