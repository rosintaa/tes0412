<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('login.login');
    }
    function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $infologin = [
            'name' => $request->name,
            'password' => $request->password,
        ];
        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'administrator') {
                return redirect('admin');
            } elseif (Auth::user()->role == 'member') {
                return redirect('member');
            }
        } else {
            return redirect('')->withErrors('Username atau password salah!!')->withInput();
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
