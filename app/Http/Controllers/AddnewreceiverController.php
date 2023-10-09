<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receiver;

class AddnewreceiverController extends Controller
{
    public function addnewreceiver()
    {
        $receivers = Receiver::all();
        return view('addnewreceiver', ['receivers' => $receivers]);
    }

    public function addnewreceivers(Request $request)
    {
        $data = $request->validate([
            'receiver_ic' => 'required', //|numeric|digits:12|unique:receiver  Adjust the table name if needed
            'receiver_name' => 'required' //|alpha|max:255  Adjust maximum length and format as needed
        ]);

        // Check if the receiver already exists in the database
        $existingReceiver = Receiver::where('receiver_ic', $data['receiver_ic'])->first();

        if ($existingReceiver) {
            // Receiver already exists, redirect to the same page with an error message
            return redirect(route('addnewreceiver'))->with('error', 'Receiver already exist.');
        } else {
            // Receiver does not exist, insert the data
            $data['receiver_name'] = strtoupper($data['receiver_name']);

            Receiver::create($data);
            
            // Redirect to the same page with a success message
            return redirect(route('addnewreceiver'))->with('success', 'Receiver with IC: ' . $data['receiver_ic'] . ' inserted successfully!');
        }
    }
}
