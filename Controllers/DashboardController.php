<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\petugas;
use App\Models\RentLogs;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $rentlogs = RentLogs::with(['user', 'book'])->where('actual_return_date', '!=', null)->get();

        $bookCount = Book::count();
        $categoryCount = Category::count();
        $userCount = User::where('role_id', '3')->count();
        $users = User::where('role_id', '3')->get();
        $petugasCount = User::where('role_id', '2')->count();
        return view('dashboard', [
            'book_count' => $bookCount, 'category_count' => $categoryCount,
            'user_count' => $userCount,
            'petugas_count' => $petugasCount,
            'users' => $users,
            'rentlogs' => $rentlogs
        ]);
    }
}
