<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function signIn() {
        return view('signin');
    }

    public function signUp() {
        return view('signup');
    }

    public function actionSignIn(Request $request) {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        Session::flash('error', "Email or password not matched");
        return redirect()->back();
    }

    public function actionSignUp(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $this->actionSignIn($request);

        return redirect('/');
    }

    public function signout() {
        Auth::logout();
        return redirect('/');
    }
}
