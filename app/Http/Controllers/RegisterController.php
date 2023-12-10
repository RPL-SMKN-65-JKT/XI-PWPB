<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('main.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'email|required',
            'phone_number' => 'required',
            'username' => 'unique:users,username|required',
            'password' => 'required'
        ]);

        $validated['name'] = ucwords($validated['name']);
        $validated['place_of_birth'] = ucwords($validated['place_of_birth']);
        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        return redirect('/register/success')->with('RegisterName', $user->name);
    }

    public function success()
    {
        return view('main.registerSuccess');
    }
}
