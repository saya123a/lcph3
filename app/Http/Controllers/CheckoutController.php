<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receiver;
use App\Models\Item;
use App\Models\ItemReceiver;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $receivers = Receiver::all(); // Retrieve all receiver details from the database

        return view('checkout', compact('receivers'));
    }

    public function checkouts(Request $request)
    {
        $receiverIc = $request->input('receiver_name');
        $itemBarcode = $request->input('item_barcode');

        // Retrieve receiver details based on the selected receiver_ic
        $receiver = Receiver::where('receiver_ic', $receiverIc)->first();

        // Retrieve item details based on the item_barcode
        $item = Item::where('item_barcode', $itemBarcode)->first();

        if (!$item) {
            // The item with the specified barcode doesn't exist
            return redirect()->route('checkout')->with('error', 'Item does not exist.');
        }

        if ($receiver && $item) {
            // Create a new ReceiverItem record
            $itemReceiver = new ItemReceiver([
                'item_barcode' => $item->item_barcode,
                'item_name' => $item->item_name,
                'item_brand' => $item->item_brand,
                'receiver_ic' => $receiver->receiver_ic,
                'receiver_name' => $receiver->receiver_name,
            ]);

            if ($itemReceiver->save()) {
                // Delete the current item (limited to one row)
                $item->delete();
                return redirect()->route('checkout')->with('success', 'Checkout successful.');
            } else {
                return redirect()->route('checkout')->with('error', 'Error inserting data.');
            }
        } else {
            return redirect()->route('checkout')->with('error', 'Error retrieving receiver information or item name.');
       }
    }
}
