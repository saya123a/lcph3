<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddnewitemController extends Controller
{
   public function addnewitem(Request $request)
   {
       return view('addnewitem');
       dd($request);
   }
}
