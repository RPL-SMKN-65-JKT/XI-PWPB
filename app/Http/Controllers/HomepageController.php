<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function home()
    {
        $bukuPopuler = Buku::orderBy('total_pinjam', 'desc')->paginate(5);
        $bukuNovel = Buku::orderBy('total_pinjam', 'desc')->where('kategori', 'Novel')->paginate(5);
        $bukuManga = Buku::orderBy('total_pinjam', 'desc')->where('kategori', 'Manga')->paginate(5);
        $bukuStudy = Buku::orderBy('total_pinjam', 'desc')->where('kategori', 'Study')->paginate(5);



        return view('pages.homepage', compact('bukuPopuler', 'bukuNovel', 'bukuManga', 'bukuStudy'));
    }


    public function peraturan()
    {
        return view('pages.peraturan');
    }
}
