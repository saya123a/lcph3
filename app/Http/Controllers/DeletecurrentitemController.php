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

        // Find the first matching item
        $existingItem = Deletecurrentitem::where('item_barcode', $itemBarcode)->first();

        if ($existingItem) {
            // Barcode exists, delete the first matching record
            $existingItem->delete();

            return redirect()->back()->with('success', 'Data with barcode: ' . $itemBarcode . ' deleted successfully.');
        } else {
            // Barcode does not exist, show a notification
            return redirect()->route('deletecurrentitem')->with('error', 'Barcode: ' . $itemBarcode . ' does not exist.');
        }
    }
}
