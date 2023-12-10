<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        if (Auth::check()) {
            return redirect('/');
        }else{
            return view('pages.auth.login');
        }
        // return view('pages.auth.login');
    }

    public function register(){
        return view('pages.auth.register');
    }

    public function authenticating(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }

            if (Auth::user()->role_id == 2) {
                return redirect('/kumpulan-buku');
            }

        }else{
            Session()->flash('status', 'failed');
            Session()->flash('message', 'Email atau Password Salah');
            return redirect('/login');
        }
        // $credentials = $request->validate([
        //     'username' => ['required'],
        //     'password' => ['required']
        // ]);

        // if (Auth::attempt($credentials)) {
        //     if (Auth::user()->role_id == 1) {
        //         return redirect('dashboard');
        //     }
    
        //     if (Auth::user()->role_id == 2) {
        //         return redirect('/');
        //     }
        // }
        
        // Session()->flash('status', 'success');
        // Session()->flash('message', 'Login Invalid');
        // return redirect('/login');
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

    public function registerProcess(Request $request)
    {

        $user = User::create([
            'nama'     => $request->nama,
            'telepon'    => $request->telepon,
            'email'    => $request->email,
            'alamat'  => $request->alamat,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);


        Session()->flash('status', 'success');
        Session()->flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('register');

        // $validated = $request->validate([
        //     'username' => 'required|unique:users|max:255',
        //     'password' => 'required|max:255',
        //     'name'     => 'required|max:255',
        //     'phone'    => 'max:255',
        //     'address'  => 'required',
        // ]);

        // $request ['password'] = Hash::make($request->newPassword);

        // $user = User::create($request->all());

        // Session()->flash('status', 'success');
        // Session()->flash('message', 'Register Berhasil! Silahkan Login!');
        
        // return redirect('register');
    }
}
