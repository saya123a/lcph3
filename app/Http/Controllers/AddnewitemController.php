<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addnewitem;

class AddnewitemController extends Controller
{
    public function addnewitem()
    {
        $items = Addnewitem::all();
        return view('addnewitem', ['items' => $items]);
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

   public function edit(Addnewitem $item)
   {
        dd($item);
   }
}
