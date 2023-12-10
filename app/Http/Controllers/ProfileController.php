<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view('profile', [

            'role' => $role
        ]);
    }

    public function updateAdmin(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'username'  => 'required|max:255|unique:users,username,' . $user->id,
            'name'  => 'required|max:255',
            'address'  => 'required|max:255',
            'nomorTlp'  => 'required|max:255',
            'profile_image' => ["image", 'max:8000'],
            'TempatLahir'  => 'required|max:255',
            'TanggalLahir'  => 'required|max:255',
            'password'  => 'required|max:255',
            'email'  => 'required|max:255|unique:users,email,' . $user->id,
            'role_id' => 'exists:roles,id',
        ]);

        if ($request->hasFile('profile_image')) {
            $profile = $request->file('profile_image')->getClientOriginalExtension();
            $filename = $request->username . "_" . time() . '.' . $profile;
            $request->file('profile_image')->storeAs('profile', $filename);
            $validated['profile_image'] = $filename;
        }

        $user->slug = null;
        $user->update($validated);
        return redirect('profile')->with('status', 'Profile berhasil di edit');
    }

    public function userprofile()
    {

        return view('userprofile');
    }

    public function update(Request $request)
    {

        $user = Auth::user();

        $validated = $request->validate([
            'username'  => 'required|max:255|unique:users,username,' . $user->id,
            'name'  => 'required|max:255',
            'address'  => 'required|max:255',
            'nomorTlp'  => 'required|max:255',
            'profile_image' => ["image", 'max:8000'],
            'TempatLahir'  => 'required|max:255',
            'TanggalLahir'  => 'required|max:255',
            'password'  => 'required|max:255',
            'email'  => 'required|max:255|unique:users,email,' . $user->id,
            'role_id' => 'exists:roles,id',
        ]);

        if ($request->hasFile('profile_image')) {
            $profile = $request->file('profile_image')->getClientOriginalExtension();
            $filename = $request->username . "_" . time() . '.' . $profile;
            $request->file('profile_image')->storeAs('profile', $filename);
            $validated['profile_image'] = $filename;
        }

        $user->slug = null;
        $user->update($validated);
        return redirect('userprofile')->with('status', 'Profile berhasil di edit');
    }
}
