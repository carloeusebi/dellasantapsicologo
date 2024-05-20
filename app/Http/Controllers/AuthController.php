<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {

        $user = $request->only(['email', 'password']);

        if (Auth::attempt($user)) {
            return redirect()->intended(route('admin'));
        } else {
            return redirect()->back()->withErrors([
                'login' => 'Email o Password errati.',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
