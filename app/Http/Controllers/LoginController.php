<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginform()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('homepage'); // Change this to your home route
        }

        return redirect()->back()->withErrors(['msgfailed' => 'Username does not exist or the password is incorrect.']);
    }

    public function signupform()
    {
        return view('login');
    }

    public function signup(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|unique',
            'password' => 'required',
        ]);

        $data['password'] = bcrypt($data['password']); // Hash the password

        $add = Login::create($data);

        return redirect()->route('login')->with('msgsuccess', 'Successfully Registered.');
    }
}
