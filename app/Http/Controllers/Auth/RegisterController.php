<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        // validate
        $requestData = $request->validate([
            'name' => 'required | max:50',
            'email' => 'required | email',
            'password' => 'required | min:3'
        ]);
        // insert into user model
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        // sign in the user
        auth()->attempt($request->only('email', 'password'));

        // redirect to dashboard
        return redirect()->route('dashboard');
    }
}
