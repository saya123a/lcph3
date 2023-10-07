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

    public function addcurrentitems(Request $request)
    {
        $itemBarcode = $request->input('item_barcode');

        // Check if the barcode already exists in the database
        $existingItem = Addcurrentitem::where('item_barcode', $itemBarcode)->first();

        if ($existingItem) {
            // Barcode exists, retrieve existing details
            $itemName = $existingItem->item_name;
            $itemBrand = $existingItem->item_brand;

            // Add new data with the existing barcode
            Addcurrentitem::create([
                'item_barcode' => $itemBarcode,
                'item_name' => $itemName,
                'item_brand' => $itemBrand,
            ]);

            return redirect()->back()->with('success', 'Data with barcode: ' . $itemBarcode . ' added successfully.');
        } else {
            // Barcode does not exist, flash an error message and redirect
            return redirect()->route('addcurrentitem')->with('error', 'Barcode: ' . $itemBarcode . ' does not exist in the database. Please choose Add New Stocks to add the item');
        }
    }
}
