<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\RentLogs;
use App\Models\User;
use Database\Seeders\RentlogsSeeder;
use Illuminate\Http\Request;
use PDF;


class PdfController extends Controller
{
    public function pdfPeminjamanDipinjam()
    {
        $dipinjam = RentLogs::where('status', 'Dipinjam')->get();


        $pdf = PDF::loadView('pages.pdf.peminjaman.dipinjamPDF', compact('dipinjam'));
        return $pdf->stream('SpancaLibrary_dipinjam.pdf');
    }

    public function pdfPeminjamanDipinjamDownload()
    {
        $dipinjam = RentLogs::where('status', 'Dipinjam')->get();


        $pdf = PDF::loadView('pages.pdf.peminjaman.dipinjamPDF', compact('dipinjam'));
        return $pdf->download('SpancaLibrary_dipinjam.pdf');
    }


    public function pdfPeminjamanDikembalikan()
    {
        $dikembalikan = RentLogs::where('status', 'Dikembalikan')
            ->where('denda', null)
            ->get();


        $pdf = PDF::loadView('pages.pdf.peminjaman.dikembalikanPDF', compact('dikembalikan'));
        return $pdf->stream('SpancaLibrary_dikembalikan.pdf');
    }

    public function pdfPeminjamanDikembalikanDownload()
    {
        $dikembalikan = RentLogs::where('status', 'Dikembalikan')
            ->where('denda', null)
            ->get();


        $pdf = PDF::loadView('pages.pdf.peminjaman.dikembalikanPDF', compact('dikembalikan'));
        return $pdf->download('SpancaLibrary_dikembalikan.pdf');
    }


    public function pdfPeminjamanTerlambat()
    {
        $terlambat = RentLogs::where('status', 'Dikembalikan')
            ->where('denda', '!=', null)
            ->get();


        $pdf = PDF::loadView('pages.pdf.pelanggaran.terlambatPDF', compact('terlambat'));
        return $pdf->stream('SpancaLibrary_terlambat.pdf');
    }

    public function pdfPeminjamanTerlambatDownload()
    {
        $terlambat = RentLogs::where('status', 'Dikembalikan')
            ->where('denda', '!=', null)
            ->get();


        $pdf = PDF::loadView('pages.pdf.pelanggaran.terlambatPDF', compact('terlambat'));
        return $pdf->download('SpancaLibrary_terlambat.pdf');
    }


    public function pdfPeminjamanRusak()
    {
        $rusak = RentLogs::where('status', 'Rusak')
            ->where('denda', '!=', null)
            ->get();


        $pdf = PDF::loadView('pages.pdf.pelanggaran.rusakPDF', compact('rusak'));
        return $pdf->stream('SpancaLibrary_rusak.pdf');
    }

    public function pdfPeminjamanRusakDownload()
    {
        $rusak = RentLogs::where('status', 'Rusak')
            ->where('denda', '!=', null)
            ->get();


        $pdf = PDF::loadView('pages.pdf.pelanggaran.rusakPDF', compact('rusak'));
        return $pdf->download('SpancaLibrary_rusak.pdf');
    }


    public function pdfPeminjamanHilang()
    {
        $hilang = RentLogs::where('status', 'Hilang')
            ->where('denda', '!=', null)
            ->get();


        $pdf = PDF::loadView('pages.pdf.pelanggaran.hilangPDF', compact('hilang'));
        return $pdf->stream('SpancaLibrary_hilang.pdf');
    }

    public function pdfPeminjamanHilangDownload()
    {
        $hilang = RentLogs::where('status', 'Hilang')
            ->where('denda', '!=', null)
            ->get();


        $pdf = PDF::loadView('pages.pdf.pelanggaran.hilangPDF', compact('hilang'));
        return $pdf->download('SpancaLibrary_hilang.pdf');
    }


    public function pdfPerizinanEbook()
    {
        $ebook = Ebook::orderByRaw("FIELD(status, 'Siap Download', 'Selesai')")
            ->orderBy('created_at', 'desc')
            ->whereHas('users')
            ->whereHas('buku')
            ->get();


        $pdf = PDF::loadView('pages.pdf.perizinan.catatanEbookPDF', compact('ebook'));
        return $pdf->stream('SpancaLibrary_ebook.pdf');
    }

    public function pdfPerizinanEbookDownload()
    {
        $ebook = Ebook::orderByRaw("FIELD(status, 'Siap Download', 'Selesai')")
            ->orderBy('created_at', 'desc')
            ->whereHas('users')
            ->whereHas('buku')
            ->get();


        $pdf = PDF::loadView('pages.pdf.perizinan.catatanEbookPDF', compact('ebook'));
        return $pdf->download('SpancaLibrary_ebook.pdf');
    }



    public function pdfUserLihat()
    {
        $user = User::where('role_id', 2)->get();
        $rents = RentLogs::where('status', '!=', 'Butuh Persetujuan')->get();
        $ebooks = Ebook::all();

        $pdf = PDF::loadView('pages.pdf.user.userPdf', compact('user', 'rents', 'ebooks'));
        return $pdf->stream('SpancaLibrary_user.pdf');
    }


    public function pdfUserDownload()
    {
        $user = User::where('role_id', 2)->get();
        $rents = RentLogs::where('status', '!=', 'Butuh Persetujuan')->get();
        $ebooks = Ebook::all();

        $pdf = PDF::loadView('pages.pdf.user.userPdf', compact('user', 'rents', 'ebooks'));
        return $pdf->download('SpancaLibrary_user.pdf');
    }
}
