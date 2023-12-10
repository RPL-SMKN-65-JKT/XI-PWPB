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
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register/register');
    }

    public function registerProcess(Request $request)
    {

        $request->validate([
            'username'  => 'required|unique:users|max:255',
            'name'  => 'required|max:255',
            'address'  => 'required|max:255',
            'nomorTlp'  => 'required|max:255',
            'profile_image' => ['required', "image", 'max:2048'],
            'TempatLahir'  => 'required|max:255',
            'TanggalLahir'  => 'required|max:255',
            'password'  => 'required|max:255',
            'email'  => 'required|unique:users|max:255'
        ]);

        if ($request->hasFile('profile_image')) {
            $profile = $request->file('profile_image')->getClientOriginalExtension();
            $filename = $request->username . "_" . time() . '.' . $profile;
            $request->file('profile_image')->storeAs('profile', $filename);
        }

        User::create([

            'username'  => $request->username,
            'name'  => $request->name,
            'address'  => $request->address,
            'nomorTlp'  => $request->nomorTlp,
            'TempatLahir'  => $request->TempatLahir,
            'TanggalLahir'  => $request->TanggalLahir,
            'password'  => Hash::make($request->password),
            'email'  => $request->email,
            'profile_image' => $filename
        ]);







        Session()->flash('status', 'success');
        Session()->flash('message', 'Register Telah berhasil,silahkan login menggunakan username dan password.');
        return redirect('/register');
    }

    public function edituser()
    {
    }
}
