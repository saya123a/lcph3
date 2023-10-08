<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addnewreceiver;

class AddnewreceiverController extends Controller
{
    public function addnewreceiver()
    {
        $receivers = Addnewreceiver::all();
        return view('addnewreceiver', ['receivers' => $receivers]);
    }

    public function addnewreceivers(Request $request)
    {
        $data = $request->validate([
            'ic' => 'required',
            'name' => 'required',
        ]);

        // Check if the receiver already exists in the database
        $existingReceiver = Addnewreceiver::where('ic', $data['ic'])->first();

        if ($existingReceiver) {
            // Receiver already exists, redirect to the same page with an error message
            return redirect(route('addnewreceiver'))->with('error', 'Receiver already exist.');
        } else {
            // Receiver does not exist, insert the data
            $data['name'] = ucwords($data['item_name']);

            Addnewreceiver::create($data);
            
            // Redirect to the same page with a success message
            return redirect(route('addnewreceiver'))->with('success', 'Receiver with IC: ' . $data['item_barcode'] . ' inserted successfully!');
        }
    }
}
