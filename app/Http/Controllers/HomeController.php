<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     
    public function index()
    {
        return view('home');
    }*/
    
    public function home()
    {
        $items = Home::all();
        return view('home', ['items' => $items]);
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
