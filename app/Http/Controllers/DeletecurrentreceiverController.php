<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deletecurrentreceiver;

class DeletecurrentreceiverController extends Controller
{
    public function deletecurrentreceiver()
    {
        return view('deletecurrentreceiver');
    }

    public function deletecurrentreceivers(Request $request)
    {
        $receiverIc = $request->input('receiver_ic');
        $message = '';

        // Find the first matching item
        $existingReceiver = Deletecurrentreceiver::where('receiver_ic', $receiverIc)->first();

        if ($existingReceiver) {
            // Receiver exists, delete the first matching record
            $existingReceiver->delete();

            $message = 'Receiver with IC: ' . $receiverIc . ' deleted successfully.';
        } else {
            // Receiver does not exist, set an error message
            $message = 'IC: ' . $receiverIc . ' does not exist.';
        }

        return redirect()->route('deletecurrentreceiver')->with('message', $message);
    }
}
