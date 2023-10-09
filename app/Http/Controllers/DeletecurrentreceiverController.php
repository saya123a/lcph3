<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receiver;

class DeletecurrentreceiverController extends Controller
{
    public function deletecurrentreceiver()
    {
        return view('deletecurrentreceiver');
    }

    public function deletecurrentreceivers(Request $request)
    {
        $receiverIc = $request->input('receiver_ic');

        // Find the first matching item
        $existingReceiver = Receiver::where('receiver_ic', $receiverIc)->first();

        if ($existingReceiver) {
            // Receiver exists, delete the first matching record
            $existingReceiver->delete();

            return redirect()->back()->with('success', 'Receiver with IC: ' . $receiverIc . ' deleted successfully.');
        } else {
            // Barcode does not exist, show a notification
            return redirect()->route('deletecurrentreceiver')->with('error', 'IC: ' . $receiverIc . ' does not exist.');
        }

        return redirect()->route('deletecurrentreceiver')->with('message', $message);
    }
}
