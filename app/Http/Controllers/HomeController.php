<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Receiver;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function home()
    {
        // Retrieve data from the "Item" table using Eloquent
        $items = Item::all();

        // Query to retrieve item_name, item_brand, and quantity for stock
        $stockItems = DB::table('item')
            ->select('item_name', 'item_brand')
            ->selectRaw('COUNT(item_barcode) AS quantity')
            ->groupBy('item_name', 'item_brand')
            ->get();

        // Retrieve receiver_ic and receiver_name
        $receivers = Receiver::all();

    return view('home', ['items' => $items, 'stockItems' => $stockItems, 'receivers' => $receivers]);
    }   
/**
    public function homes(Request $request)
    {
        $data = $request->validate([
            'item_barcode' => 'required',
            'item_name' => 'required',
            'item_brand' => 'required'
        ]);

        $add = Home::create($data);
        return redirect(route('home'));
    }

    public function edit(Home $item)
    {
        return view('edit', ['item' => $item]);
    }

    public function update(Home $item, Request $request)
    {
        $data = $request->validate([
            'item_barcode' => 'required',
            'item_name' => 'required',
            'item_brand' => 'required'
        ]);

        $item->update($data);
        return redirect(route('home'));
    }

    public function delete(Home $item)
    {
        $item->delete();
        return redirect(route('home'));
    }**/
}
