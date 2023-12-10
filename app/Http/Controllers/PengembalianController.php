<?php

namespace App\Http\Controllers;

use App\Models\BookLoan;
use App\Models\LoanPenalty;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function input()
    {
        return view('dashboard.pengembalian.input', [
            'title' => 'Pengembalian'
        ]);
    }

    public function submitInput(Request $request)
    {
        $validated = $request->validate([
            'kode_peminjaman' => 'numeric|exists:book_loans,kode_peminjaman'
        ], [
            'kode_peminjaman.numeric' => 'Kode peminjaman hanya berisi angka',
            'kode_peminjaman.exists' => 'Not Found'
        ]);

        if (BookLoan::where('kode_peminjaman', $validated['kode_peminjaman'])->where('status_id', 2)->orWhere('status_id', 4)->get()->isNotEmpty()) {
            return redirect('/dashboard/pengembalian/found')->with([
                'kode_peminjaman' => $validated['kode_peminjaman']
            ]);
        } else {
            return redirect('/dashboard/pengembalian')->with([
                'failed' => 'Not Found'
            ]);
        }
    }

    public function index(Request $request)
    {
        if (session()->has('kode_peminjaman')) {
            $kode_peminjaman = $request->session()->get('kode_peminjaman');
            return view('dashboard.pengembalian.index', [
                'bookLoan' => BookLoan::where('kode_peminjaman', $kode_peminjaman)->first(),
                'title' => "Pengembalian"
            ]);
        } else {
            return redirect('/dashboard/pengembalian');
        }
    }

    public function denda(Request $request)
    {
        if (session()->has('kode_peminjaman')) {
            $kode_peminjaman = $request->session()->get('kode_peminjaman');
            return view('dashboard.pengembalian.denda', [
                'bookLoan' => BookLoan::where('kode_peminjaman', $kode_peminjaman)->first(),
                'title' => "Pengembalian"
            ]);
        } else {
            return redirect('/dashboard/pengembalian');
        }
    }

    public function dendaLoan(Request $request, BookLoan $bookLoan)
    {
        $date = new Carbon();
        $dateNow = $date->now();
        $tanggal_pengembalian = Carbon::parse($bookLoan->tanggal_pengembalian);
        $dendaHarian = 2000;

        $result = $dateNow->gt($tanggal_pengembalian);
        if ($result) {
            $selisih = $dateNow->diffInDays($tanggal_pengembalian);
            $denda_keterlambatan = $selisih * $dendaHarian;
            return redirect('/dashboard/pengembalian/denda')->with([
                'denda_keterlambatan' => $denda_keterlambatan,
                'kode_peminjaman' => $bookLoan->kode_peminjaman,
                'keterlambatan_hari' => $selisih
            ]);
        } else {
            return redirect('/dashboard/pengembalian/denda')->with([
                'denda_keterlambatan' => 0,
                'kode_peminjaman' => $bookLoan->kode_peminjaman
            ]);
        }
    }

    public function submitLoan(Request $request, BookLoan $bookLoan)
    {
        $validated = $request->validate([
            'loan_id' => 'required|exists:book_loans,id',
            'denda_keterlambatan' => 'required|numeric',
            'denda_kerusakan' => 'required|numeric'
        ]);

        $today = Carbon::today()->format('Y-m-d');

        if ($validated['denda_keterlambatan'] == 0 && $validated['denda_kerusakan'] == 0) {
            $bookLoan->update([
                'status_id' => 3,
                'denda' => false,
                'tanggal_kembali' => $today
            ]);
        } else {
            $bookLoan->update([
                'status_id' => 3,
                'denda' => true,
                'tanggal_kembali' => $today
            ]);

            LoanPenalty::create($validated);
        }

        return redirect('/dashboard')->with([
            'success' => "Mengembalikan Peminjaman Oleh ",
            'name' => $bookLoan->user->name
        ]);
    }
}
