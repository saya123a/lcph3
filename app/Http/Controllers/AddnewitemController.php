<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class AddnewitemController extends Controller
{
    public function addnewitem()
    {
        $items = Item::all();
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
        $existingItem = Item::where('item_barcode', $data['item_barcode'])->first();

        if ($existingItem) {
            // Barcode already exists, redirect to the same page with an error message
            return redirect(route('addnewitem'))->with('error', 'Barcode already exists in the database. Please choose Add Current Stocks to add the item.');
        } else {
            // Barcode does not exist, insert the data
            $data['item_name'] = ucwords($data['item_name']);
            $data['item_brand'] = ucwords($data['item_brand']);
            $data['item_datereg'] = now();

            Item::create($data);
            
            // Redirect to the same page with a success message
            return redirect(route('addnewitem'))->with('success', 'New stock with barcode: ' . $data['item_barcode'] . ' inserted successfully!');
        }
    }
    
   /** 
   public function edit(Item $item)
   {
        return view('edit', ['item' => $item]);
   }

   public function update(Item $item, Request $request)
   { 
       $data = $request->validate([
           'item_barcode' => 'required',
           'item_name' => 'required',
           'item_brand' => 'required'
       ]);

       $item->update($data);
       return redirect(route('addnewitem'));
   }

   public function delete(Item $item)
   {
       $item->delete();
       return redirect(route('addnewitem'));
   }**/
}
