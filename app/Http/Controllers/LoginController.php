<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:login', ['except' => 'logout']);
    }
    public function formlogin()
    {
        return view('login.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:logins',
            'password' => 'required'
        ]);
        if (Auth::guard('login')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended(config('login.prefix'));
        }
        return back()->withErrors([
            'email' => 'email do not match',
        ]);
    }

    public function logout()
    {
        Auth::guard('login')->logout();
        return redirect()->route('login.login');
    }
}
