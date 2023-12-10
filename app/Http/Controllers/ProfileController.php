<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $dateNow = Carbon::now()->format('Y-m-d');
        $currentUserId = Auth::user()->id;
        $user = User::where('id', $currentUserId)->first();
        return view('main.profile', [
            'user' => $user,
            'date_now' => $dateNow
        ]);
    }

    public function edit(User $user)
    {
    }

    public function dashboardIndex()
    {
        $currentUserId = Auth::user()->id;
        $user = User::where('id', $currentUserId)->first();
        return view('dashboard.profile.index', [
            'user' => $user,
            'title' => 'Profil Saya'
        ]);
    }

    public function updateImage(Request $request, User $user)
    {
        $validated = $request->validate([
            'profile_picture' => 'image|file|max:10240'
        ]);

        if ($request->oldImage == "profile-image/unknown.png") {
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile-image');
        } else {
            Storage::delete($request->oldImage);
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile-image');
        }

        $user->update($validated);

        return redirect('/profile')->with([
            'success' => 'Berhasil Mengubah Foto Profil'
        ]);
    }

    public function updateImageDashboard(Request $request, User $user)
    {
        $validated = $request->validate([
            'profile_picture' => 'image|file|max:10240'
        ]);

        if ($request->oldImage == "profile-image/unknown.png") {
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile-image');
        } else {
            Storage::delete($request->oldImage);
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile-image');
        }

        $user->update($validated);

        return redirect('/dashboard/profile')->with([
            'success' => 'Berhasil Mengubah Foto Profil'
        ]);
    }
}
