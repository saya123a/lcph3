<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function home()
    {
        // Retrieve data from the "home" table using Eloquent
        $items = Home::all();

        // Query to retrieve item_name, item_brand, and quantity for stock
        $stockItems = DB::table('item')
            ->select('item_name', 'item_brand')
            ->selectRaw('COUNT(item_barcode) AS quantity')
            ->groupBy('item_name', 'item_brand')
            ->get();

        return view('home', ['items' => $items, 'stockItems' => $stockItems]);
    }

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
    }
}
