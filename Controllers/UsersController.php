<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', [
            'users' => $users
        ]);
        // where('role_id', '3')->get()
    }

    public function add()
    {
        $role = Role::all();
        return view('user-add', [

            'role' => $role
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username'  => 'required|unique:users|max:255',
            'name'  => 'required|max:255',
            'address'  => 'required|max:255',
            'nomorTlp'  => 'required|max:255',
            'profile_image' => ['required', "image", 'max:1000'],
            'TempatLahir'  => 'required|max:255',
            'TanggalLahir'  => 'required|max:255',
            'password'  => 'required|max:255',
            'email'  => 'required|unique:users|max:255',
            'role_id' => 'exists:roles,id',

        ]);


        if ($request->hasFile('profile_image')) {
            $profile = $request->file('profile_image')->getClientOriginalExtension();
            $filename = $request->username . "_" . time() . '.' . $profile;
            $request->file('profile_image')->storeAs('profile', $filename);
        }
        $validated['profile_image'] = $filename;
        $validated['role_id'] = $request->input('role_id');
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect('users')->with('status', 'User Berhasil Ditambahkan');
    }

    public function edit($slug)
    {
        $user = User::where('slug', $slug)->first();
        $role = Role::all();
        return view('user-edit', [
            'user' => $user,
            'role' => $role
        ]);
    }
    public function update(Request $request, $slug)
    {

        $user = User::where('slug', $slug)->first();

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
        $validated['password'] = Hash::make($validated['password']);

        $user->slug = null;
        $user->update($validated);
        return redirect('users')->with('status', 'User berhasil di edit');
    }


    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $gambarUser = $user->profile_image;
        Storage::delete('profile/' . $gambarUser);
        $user->delete();
        return redirect('users')->with('status', 'User berhasil di hapus');
    }

    public function detail($slug)
    {

        $user = User::where('slug', $slug)->first();
        $rentlogs = RentLogs::with(['user', 'book'])->where('user_id', $user->id)->get();
        $role = Role::all();
        return view('user-detail', ['user' => $user, 'role' => $role, 'rentlogs' => $rentlogs]);
    }
}
