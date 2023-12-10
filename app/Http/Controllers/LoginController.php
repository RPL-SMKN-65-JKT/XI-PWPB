<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('main.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2) {
                return redirect('/dashboard');
            } else {
                return redirect('/')->with([
                    'successLogin' => auth()->user()->id
                ]);
            }
        }

        return redirect('/login')->with('failed', 'Username / Password Tidak Valid');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
