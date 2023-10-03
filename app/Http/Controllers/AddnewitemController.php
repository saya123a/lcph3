<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddnewitemController extends Controller
{
   public function addnewitem()
   {
       return view('addnewitem');
   }

   public function addnewitems(Request $request)
   {
       dd($request);
   }
}
