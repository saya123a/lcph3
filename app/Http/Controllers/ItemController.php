<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
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

    public function addcurrentitem()
    {
        return view('addcurrentitem');
    }

    public function addcurrentitems(Request $request)
    {
        $itemBarcode = $request->input('item_barcode');

        // Check if the barcode already exists in the database
        $existingItem = Item::where('item_barcode', $itemBarcode)->first();

        if ($existingItem) {
            // Barcode exists, retrieve existing details
            $itemName = $existingItem->item_name;
            $itemBrand = $existingItem->item_brand;

            // Add new data with the existing barcode
            Item::create([
                'item_barcode' => $itemBarcode,
                'item_name' => $itemName,
                'item_brand' => $itemBrand,
            ]);

            return redirect()->back()->with('success', 'Data with barcode: ' . $itemBarcode . ' added successfully.');
        } else {
            // Barcode does not exist, flash an error message and redirect
            return redirect()->route('addcurrentitem')->with('error', 'Barcode: ' . $itemBarcode . ' does not exist in the database. Please choose Add New Stocks to add the item.');
        }
    }

    public function deletecurrentitem()
    {
        return view('deletecurrentitem');
    }

    public function deletecurrentitems(Request $request)
    {
        $itemBarcode = $request->input('item_barcode');

        // Find the first matching item
        $existingItem = Item::where('item_barcode', $itemBarcode)->first();

        if ($existingItem) {
            // Barcode exists, delete the first matching record
            $existingItem->delete();

            return redirect()->back()->with('success', 'Data with barcode: ' . $itemBarcode . ' deleted successfully.');
        } else {
            // Barcode does not exist, show a notification
            return redirect()->route('deletecurrentitem')->with('error', 'Barcode: ' . $itemBarcode . ' does not exist.');
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
