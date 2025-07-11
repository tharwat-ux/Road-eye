<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('Auth/login');
    }

    public function validate(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            if(auth()->user()->role == 'user')
            {
            return redirect()->route('UserProfile', ['id' =>auth()->user()->id] )->with('success', 'Logged in successfully!  , welcome back');
            }
            elseif(auth()->user()->role == 'admin')
            {
                return redirect()->route('admin.profile', ['id' =>auth()->user()->id] )->with('success', 'Logged in successfully!  , welcome back');
            }
            elseif(auth()->user()->role == 'superadmin')
            {
                return redirect()->route('admins.control')->with('success', 'Logged in successfully!  , welcome back');
            }
        }
        return back()->withErrors(['credentials' => '   Invalid credentials.']);

    }


    public function register()
    {
        return view('Auth/register');
    }

    public function store(Request $request)
    {

        $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required|min:6|same:password',
        ],[
        'email.unique' => 'This email is already registered , please try another one.',
        'password.confirmed' => 'Two passwords must be the same , please try again .',
        'password_confirmation.same' => 'Two passwords must be the same , please try again .',

        ]
        );

        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password, 
        ]);
        Auth::attempt($request->only('email', 'password'));
        return redirect()->route('UserProfile', ['id' =>auth()->user()->id] )->with('success', 'Your account has been created successfully!');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }

}


