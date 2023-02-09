<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function signIn(Request $request)
    {
        // validate
        $request->validate([
            'email' => 'required | email',
            'password' => 'required | min:3'
        ]);

        // sign in the user
        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid Credentials');
        }

        // redirect to dashboard
        return redirect()->route('dashboard');
    }
}
