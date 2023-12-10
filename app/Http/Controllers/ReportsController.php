<?php

namespace App\Http\Controllers;

use App\Models\BookLoan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.reports.index', [
            'title' => 'Laporan',
            'bookLoans' => BookLoan::orderBy('id', 'desc')->get()
        ]);
    }

    public function pdf()
    {
        $tanggal_peminjaman_from = "2023-12-07";
        $bookLoan = BookLoan::where('status_id', 3)->whereDate('tanggal_peminjaman', '>=', $tanggal_peminjaman_from)->get();
        return view('dashboard.reports.pdf', [
            'bookLoans' => $bookLoan
        ]);
    }

    public function view_pdf(Request $request)
    {
        $tanggal_peminjaman_dari = $request->get('tanggal_peminjaman_dari');
        $tanggal_peminjaman_sampai = $request->get('tanggal_peminjaman_sampai');
        $mpdf = new \Mpdf\Mpdf();
        $bookLoan = BookLoan::where('status_id', 3)->whereDate('tanggal_peminjaman', '>=', $tanggal_peminjaman_dari)->whereDate('tanggal_peminjaman', '<=', $tanggal_peminjaman_sampai)->get();
        $mpdf->WriteHTML(view('dashboard.reports.pdf', [
            'bookLoans' => $bookLoan,
            'tanggal_peminjaman_dari' => $tanggal_peminjaman_dari,
            'tanggal_peminjaman_sampai' => $tanggal_peminjaman_sampai
        ]));
        $mpdf->Output();
    }
}
