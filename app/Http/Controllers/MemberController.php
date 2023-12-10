<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    public function showMembers() {

        if (!Auth::user()->isAdmin) {
            return abort(404);
        }

        return view('members', [
            'members' => User::where('isMember', '=', true)->get(),
        ]);

    }

    public function editMember(User $user) {
        
        if (!Auth::user()->isAdmin && !$user->isMember) {
            return abort(404);
        }

        return view('editmember', [
            'member' => $user
        ]);

    }
    
    public function actionEditMember(Request $request) {

        if (!Auth::user()->isAdmin) {
            return abort(404);
        }

        $user = User::find($request->id);

        if (!$user->isMember) {
            return abort(404);
        }

        if (empty($request->password)) {

            $user->update([
                'email' => $request->email,
                'name' => $request->name,
                'nis' => $request->nis,
                'major' => $request->major,
                'class' => $request->class
            ]);

            Session::flash('success', 'sukses mengedit member');
            return redirect('/members');
        }

        $user->update([
            'email' => $request->email,
            'name' => $request->name,
            'nis' => $request->nis,
            'major' => $request->major,
            'class' => $request->class,
            'password' => Hash::make($request->password)
        ]);

        Session::flash('success', 'sukses mengedit member');
        return redirect('/members');

    }

    public function addMember() {

        if (!Auth::user()->isAdmin) {
            return abort(404);
        }

        return view('addmember', [
            'users' => User::where('isMember', '=', false)
            ->where('credentials', '=', true)->get()
        ]);

    }

    public function addNewUser(Request $request) {

        if (!Auth::user()->isAdmin) {
            return abort(404);
        }

        if ($request->has('usertomember')) {
            User::find($request->usertomember)->update([
                'isMember' => true
            ]);

            Session::flash('success', 'sukses menambahkan member');
            return redirect('/members');
        }

        User::create([
            'isMember' => true,
            'email' => $request->email,
            'name' => $request->name,
            'nis' => $request->nis,
            'major' => $request->major,
            'class' => $request->class,
            'password' => Hash::make($request->password),
            'credentials' => true
        ]);

        Session::flash('success', 'sukses menambahkan member');
        return redirect('/members');
        
    }

    public function deleteMember(User $user) {
        if (!Auth::user()->isAdmin && !$user->isMember) {
            return abort(404);
        }
        
        $user->update([
            'isMember' => false
        ]);

        Session::flash('success', 'sukses remove member');
        return redirect('/members');
    }
}
