<?php

namespace App\Http\Controllers;

use App\Models\BookLoan;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    public function input()
    {
        return view('dashboard.verifikasi.input', [
            'title' => 'Verifikasi'
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

        if (BookLoan::where('kode_peminjaman', $validated['kode_peminjaman'])->where('status_id', 1)->get()->isNotEmpty()) {
            return redirect('/dashboard/verifikasi/found')->with([
                'kode_peminjaman' => $validated['kode_peminjaman']
            ]);
        } else {
            return redirect('/dashboard/verifikasi')->with([
                'failed' => 'Not Found'
            ]);
        }
    }

    public function index(Request $request)
    {
        if (session()->has('kode_peminjaman')) {
            $kode_peminjaman = $request->session()->get('kode_peminjaman');
            return view('dashboard.verifikasi.index', [
                'bookLoan' => BookLoan::where('kode_peminjaman', $kode_peminjaman)->first(),
                'title' => "Verifikasi"
            ]);
        } else {
            return redirect('/dashboard/verifikasi');
        }
    }

    public function verifLoan(Request $request, BookLoan $bookLoan)
    {
        if ($bookLoan->status_id == 1) {
            $validated['status_id'] = 2;
            $bookLoan->update($validated);
            return redirect('/dashboard')->with([
                'success' => "Memverifikasi Peminjaman Oleh ",
                'name' => $bookLoan->user->name
            ]);
        } else {
            return redirect('/dashboard')->with([
                'failed' => "Gagal Memverifikasi Peminjaman"
            ]);
        }
    }
}
