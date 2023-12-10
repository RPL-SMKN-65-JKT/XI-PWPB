<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\BookLoan;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $dateNow = Carbon::now()->format('Y-m-d');
        $bookLoans = BookLoan::where('user_id', auth()->user()->id)->orderBy('id', 'desc');
        if (request('sort') == 'menunggu-verifikasi') {
            $bookLoans = BookLoan::where('user_id', auth()->user()->id)->where('status_id', 1)->orderBy('id', 'desc');
        } else if (request('sort') == 'sedang-dipinjam') {
            $bookLoans = BookLoan::where('user_id', auth()->user()->id)->where('status_id', 2)->orderBy('id', 'desc');
        } else if (request('sort') == 'sudah-dikembalikan') {
            $bookLoans = BookLoan::where('user_id', auth()->user()->id)->where('status_id', 3)->orderBy('id', 'desc');
        } else if (request('sort') == 'melewati-tenggat') {
            $bookLoans = BookLoan::where('user_id', auth()->user()->id)->where('status_id', 4)->orderBy('id', 'desc');
        } else if (request('sort') == 'gagal-verifikasi') {
            $bookLoans = BookLoan::where('user_id', auth()->user()->id)->where('status_id', 5)->orderBy('id', 'desc');
        }

        return view('main.riwayat', [
            'bookloans' => $bookLoans->get(),
            'date_now' => $dateNow
        ]);
    }

    public function detail(BookLoan $bookLoan)
    {
        $dateNow = Carbon::now()->format('Y-m-d');
        return view('main.detailRiwayat', [
            'bookLoan' => $bookLoan,
            'date_now' => $dateNow
        ]);
    }
}
