<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('register/login');
        }
    }
    public function authenticating(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            // $request->session()->regenerate();

            if (Auth::user()->role_id == 1) {

                return redirect('/dashboard')->with('success', 'Selamat datang admin');
            } else if (Auth::user()->role_id == 2) {
                return redirect('/petugas')->with('petugas', 'Selamat datang petugas');
            } else {
                return redirect('home')->with('client', 'Selamat datang di perpustakaan 65');
            }
        } else {
            return redirect('/login')->with('failed', 'Username / Password Tidak Valid');
        }
    }

    public function logout(Request $request)
    {
        if (Auth::logout()) {
            return redirect('login');
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function home()
    {
        return view('home');
    }
}
