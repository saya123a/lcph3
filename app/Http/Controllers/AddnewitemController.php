<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addnewitem;

class AddnewitemController extends Controller
{
   public function addnewitem()
   {
       $show = Addnewitem::all();
       return view('addnewitem', ['addnewitem' => $show]);
   }

   public function addnewitems(Request $request)
   {
       $data = $request->validate([
           'item_barcode' => 'required',
           'item_name' => 'required',
           'item_brand' => 'required'
       ]);

       $add = Addnewitem::create($data);
       return redirect(route('addnewitem'));
   }
}
