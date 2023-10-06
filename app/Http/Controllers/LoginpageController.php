<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loginpage; // Assuming you have a 'User' model for user management
use Illuminate\Support\Facades\Auth;

class LoginpageController extends Controller
{    
    public function loginform()
    {
        return view('loginpage', ['isSignup' => false]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect(route('homepage')); // Change this to your home route
        }
        return redirect()->back()->withErrors(['msgfailed' => 'Username does not exist or the password is incorrect.']);
    }

    public function signupform()
    {
        return view('loginpage, ['isSignup' => true]);
    }

    public function signup(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|unique:login',
            'email' => 'required|email|unique:login', // Add validation for the email field
            'password' => 'required'
        ]);

        $data['password'] = bcrypt($data['password']); // Hash the password

        Loginpage::create($data); // Use the correct model for user creation

        return redirect(route('loginpage'))->with('msgsuccess', 'Successfully Registered.');
    }
}
