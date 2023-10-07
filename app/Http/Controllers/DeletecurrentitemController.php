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

    public function deletecurrentitems(Request $request)
    {
        $itemBarcode = $request->input('item_barcode');

        // Check if the barcode exists in the database
        $existingItem = Item::where('item_barcode', $itemBarcode)->first();

        if ($existingItem) {
            // Barcode exists, delete the first matching record
            Item::where('item_barcode', $itemBarcode)->delete();

            return redirect()->back()->with('success', 'Data with barcode: ' . $itemBarcode . ' deleted successfully.');
        } else {
            // Barcode does not exist, show a notification
            return redirect()->route('deletecurrentitem')->with('error', 'Barcode: ' . $itemBarcode . ' not found in the database.');
        }
    }
}
