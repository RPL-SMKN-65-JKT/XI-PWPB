<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $users = User::orderBy('name', 'asc');

        if (request('sort') == 'role') {
            $users = User::orderBy('role_id', 'asc');
        } else if (request('sort') == 'alfabet') {
            $users = User::orderBy('name', 'asc');
        } else if (request('sort') == 'desc') {
            $users = User::orderBy('name', 'desc');
        }

        return view('dashboard.users.index', [
            'title' => 'Data Users',
            'users' => $users->filter(request(['search', 'role']))->get(),
            'total' => User::all(),
            'admins' => User::where('role_id', 1)->get(),
            'officers' => User::where('role_id', 2)->get(),
            'members' => User::where('role_id', 3)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'title' => 'Tambah User',
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'email' => 'email|required',
            'username' => 'unique:users,username|required',
            'password' => 'required',
            'address' => 'required',
            'role_id' => 'required'
        ]);

        $validated['name'] = ucwords($validated['name']);
        $validated['place_of_birth'] = ucwords($validated['place_of_birth']);
        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        return redirect('/dashboard/users')->with([
            'success' => 'Berhasil Meregistrasi User ',
            'name' => $validated['name']
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'title' => 'Edit User',
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'email' => 'email|required',
            'password' => 'required',
            'address' => 'required',
            'role_id' => 'required'
        ];

        if ($request->input('username') != $user->username) {
            $rules['username'] = 'unique:users,username|required';
        }

        $validated = $request->validate($rules);

        $validated['name'] = ucwords($validated['name']);
        $validated['place_of_birth'] = ucwords($validated['place_of_birth']);

        if ($request->input('password') != $user->password) {
            $validated['password'] = bcrypt($validated['password']);
        }

        $user->update($validated);

        return redirect('/dashboard/users')->with([
            'success' => 'Berhasil Mengedit User ',
            'name' => $validated['name']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user = User::findOrFail($user->id);
        $user->delete();
        return redirect('/dashboard/users')->with([
            'success' => 'Berhasil Menghapus User ',
            'name' => $user->name
        ]);
    }
}
