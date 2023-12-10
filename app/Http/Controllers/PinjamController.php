<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\BookLoan;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function detailBukuPinjam(Request $request)
    {
        $bookLoan = BookLoan::where('user_id', auth()->user()->id)
            ->where(function ($query) {
                $query->where('status_id', 1)
                    ->orWhere('status_id', 2);
            })->get();
        if ($bookLoan->isEmpty()) {
            $bookId = $request->input('bookId');
            $bookName = $request->input('bookName');

            return redirect('/pinjam')->with([
                'bookId' => $bookId,
                'bookName' => $bookName
            ]);
        } else {
            return back()->with([
                'failed' => 'Saat ini kamu sedang meminjam / meminta konfirmasi buku'
            ]);
        }
    }

    public function index()
    {
        $dateNow = Carbon::now()->format('Y-m-d');

        if (session()->has('bookId') && session()->has('bookName')) {
            return view('main.formpinjambuku', [
                'date_now' => $dateNow,
            ]);
        } else {
            return redirect('/koleksi');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after:tanggal_peminjaman'
        ]);

        $kodeTanggal = strrev(str_replace("-", "", $request->input('tanggal_peminjaman')));
        $kodePeminjaman = $kodeTanggal . $request->input('user_id') . $request->input('book_id');

        $validated['status_id'] = 1;
        $validated['kode_peminjaman'] = $kodePeminjaman;

        $bookLoan = BookLoan::create($validated);

        return redirect('/pinjam/success')->with([
            'kode_peminjaman' => $bookLoan['kode_peminjaman'],
        ]);
    }

    public function success(Request $request)
    {
        if (session()->has('kode_peminjaman')) {
            $kode_peminjaman = $request->session()->get('kode_peminjaman');
            return view('main.pinjamSuccess', [
                'bookLoan' => BookLoan::where('kode_peminjaman', $kode_peminjaman)->first(),
            ]);
        } else {
            return redirect('/koleksi');
        }
    }

    public function checkTanggalKembali(Request $request)
    {
        $durasi = (int)$request->query('durasi');
        $tanggal_pengembalian = Carbon::now()->addDays($durasi)->format('Y-m-d');

        return response()->json(['tanggal_pengembalian' => $tanggal_pengembalian]);
    }
}
