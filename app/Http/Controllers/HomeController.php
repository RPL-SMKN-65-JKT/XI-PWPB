<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookLoan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $date = new Carbon();
        $dateNow = $date->now();

        if (session()->has('successLogin')) {
            $sedangDipinjam = BookLoan::where('user_id', session('successLogin'))->where('status_id', 2)->first();
            if (!$sedangDipinjam) {
                return view('main.home', [
                    'books' => Book::all()->take(3),
                    'date_now' => $dateNow
                ]);
            }
            $result = $dateNow->gt($sedangDipinjam->tanggal_pengembalian);
            $validated = [
                'user_id' => $sedangDipinjam->user_id,
                'book_id' => $sedangDipinjam->book_id,
                'status_id' => 4
            ];
            if ($result) {
                $sedangDipinjam->update($validated);
                $changed = BookLoan::where('user_id', $validated['user_id'])->where('book_id', $validated['book_id'])->first();
            }
        }
        return view('main.home', [
            'books' => Book::all()->take(3),
            'date_now' => $dateNow
        ]);
    }
}
