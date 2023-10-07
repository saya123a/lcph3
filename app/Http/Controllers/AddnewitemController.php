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

        // Check if the barcode already exists in the database
        $existingItem = Addnewitem::where('item_barcode', $data['item_barcode'])->first();

        if ($existingItem) {
            // Barcode exists, retrieve existing details
            $data['item_name'] = $existingItem->item_name;
            $data['item_brand'] = $existingItem->item_brand;

            // Create a new item with the existing barcode
            Addnewitem::create($data);

            return redirect(route('addnewitem'))->with('success', 'Data with barcode: ' . $data['item_barcode'] . ' added successfully.');
        } else {
            // Barcode does not exist, redirect back with a message
            return redirect(route('addnewitem'))->with('error', 'Barcode not found in the database. Please add new data.');
        }
   }
    
   /** 
   public function edit(Addnewitem $item)
   {
        return view('edit', ['item' => $item]);
   }

   public function update(Addnewitem $item, Request $request)
   { 
       $data = $request->validate([
           'item_barcode' => 'required',
           'item_name' => 'required',
           'item_brand' => 'required'
       ]);

       $item->update($data);
       return redirect(route('addnewitem'));
   }

   public function delete(Addnewitem $item)
   {
       $item->delete();
       return redirect(route('addnewitem'));
   }**/
}
