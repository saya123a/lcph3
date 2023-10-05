<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class LoginController extends Controller
{
    public function login()
    {
        $logins = Login:all();
        return view('login', ['logins' => $logins]);
    }

    public function logins(Request $request)
    {
        $data = $request->validate([
           'username' => 'required',
           'password' => 'required',
        ]);

       $add = Login::create($data);
       return redirect(route('login'));
   }
}
