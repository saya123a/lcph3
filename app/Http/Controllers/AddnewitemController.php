<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addnewitem;

class AddnewitemController extends Controller
{
   public function addnewitem()
   {
       return view('addnewitem');
   }

   public function addnewitems(Request $request)
   {
       $data = $request->validate([
           'item_barcode' => 'required',
           'item_name' => 'required',
           'item_brand' => 'nullable'
       ]);

       $add = Addnewitem::create($data);
      return redirect()->back();
   }
}
