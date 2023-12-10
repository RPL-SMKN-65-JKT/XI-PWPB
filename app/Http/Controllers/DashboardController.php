<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard', [
            'title' => 'Dashboard',
            'books' => Book::all(),
            'admins' => User::where('role_id', 1)->get(),
            'officers' => User::where('role_id', 2)->get(),
            'members' => User::where('role_id', 3)->get(),
        ]);
    }
}
