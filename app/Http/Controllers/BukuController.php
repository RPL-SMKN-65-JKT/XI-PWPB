<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class BukuController extends Controller
{

    public function index(Request $request)
    {
        if ($request->kategori && $request->buku) {
            $bukus = Buku::where('kategori', $request->kategori)->where('nama', 'LIKE', '%'. $request->buku . '%')->get();
        } elseif($request->kategori) {
            $bukus = Buku::where('kategori', $request->kategori)->get();
        } elseif($request->buku) {
            $bukus = Buku::where('nama', 'LIKE', '%'. $request->buku . '%')->get();
        } else {
            $bukus = Buku::all();
        }
        return view('pages.admin.dBuku', compact('bukus'));
    }

    public function index_user(Request $request)
    {
        if ($request->kategori || $request->nama) {
            if ($request->kategori && $request->nama) {
                $bukus = Buku::where('kategori', $request->kategori)->where('nama', 'LIKE', '%' . $request->nama . '%' )->get();
            } elseif ($request->kategori) {
                $bukus = Buku::where('kategori', $request->kategori)->get();
            } elseif ($request->nama) {
                $bukus = Buku::where('nama', 'LIKE', '%' . $request->nama . '%' )->get();
            }
        } else {
            $bukus = Buku::all();
        }


        $novels = Buku::where('kategori', 'Novel')->get();
        $mangas = Buku::where('kategori', 'Manga')->get();
        $studys = Buku::where('kategori', 'Study')->get();

        $terpopuler = Buku::orderBy('total_pinjam', 'desc')->paginate(6);
        return view('pages.bukuUser', compact('novels', 'mangas', 'studys', 'bukus', 'terpopuler'));
    }



    public function create()
    {
        return view('pages.admin.tambahBuku');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'pengarang' => 'required',
            'penerbit'  => 'required',
            'halaman'   => 'required',
            'deskripsi' => 'required',
            'tahun_terbit'  => 'required',
            'jumlah_buku'   => 'required',
            'gambar'    => 'required',
            'kategori'  =>  'required',
            'genre' => 'required',
            'link_ebook' => ''
        ]);

        if ($request->hasFile('gambar')) {
            $uploadedFile = $request->file('gambar');
            $originalName = $uploadedFile->getClientOriginalName();
            $extension = $uploadedFile->getClientOriginalExtension();

            $newFileName = $data['nama'] . '_' . now()->format('Ymd') . '.' . $extension;

            $gambarPath = $uploadedFile->storeAs('images', $newFileName);
            $data['gambar'] = $gambarPath;
        }


        Buku::create($data);

        return redirect('tambah-buku')->with('status', 'BERHASIL MENAMBAH BUKU');
    }

    // ADMIN ADMIN ADMIN ADMIN ADMIN
    public function show($slug)
    {
        $buku = Buku::where('slug', $slug)->first();
        if ($buku) {
            return view('pages.admin.detailBuku', compact('buku'));
        } else {
            return redirect()->back();
        }
    }

    public function destroy($slug)
    {
        $buku = Buku::where('slug', $slug)->first();
        $rents = RentLogs::where('buku_id', $buku->id)->get();
        $users = User::where('buku_id', $buku->id)->get();

        if ($users) {
            foreach ($users as $user) {
                $user->buku_id = null;
                $user->save();
            }
        }

        if ($rents) {
            foreach ($rents as $rent) {
                $rent->delete();
            }
        }

        $gambarPath = $buku->gambar;
        $buku->delete();
        if ($gambarPath) {
            Storage::delete($gambarPath);
        }

        return redirect()->route('dBuku.index')->with('status', 'BUKU BERHASIL DIHAPUS');
    }

    public function edit($slug)
    {
        $buku = Buku::where('slug', $slug)->first();
        return view('pages.admin.editBuku', compact('buku'));
    }

    public function update(Request $request, $slug)
    {
        $buku = Buku::where('slug', $slug)->first();

        $data = $request->validate([
            'nama' => 'required',
            'pengarang'     => 'required',
            'penerbit'      => 'required',
            'deskripsi'     => '',
            'tahun_terbit'  => 'required',
            'halaman'       => 'required',
            'jumlah_buku'   => 'required',
            'gambar'        => '',
            'kategori'      => 'required',
            'genre'         => 'required',
            'link_ebook'    => ''
        ]);

        $gambarSebelum = $buku->gambar;

        if ($request->hasFile('gambar')) {
            if ($gambarSebelum) {
                Storage::delete($gambarSebelum);
            }
            $uploadedFile = $request->file('gambar');
            $originalName = $uploadedFile->getClientOriginalName();
            $extension = $uploadedFile->getClientOriginalExtension();

            $newFileName = $data['nama'] . '_' . now()->format('Ymd') . '.' . $extension;

            $gambarPath = $uploadedFile->storeAs('images', $newFileName);
            $data['gambar'] = $gambarPath;
        }

        // Update attributes
        $buku->slug = null;
        $buku->update($data);

        return redirect()->route('dBuku.index')->with('status', 'BUKU TELAH DIPERBARUI.');
    }




    // USER USER USER USER USER
    public function detail($slug)
    {
        $buku = Buku::where('slug', $slug)->first();

        if ($buku) {
            return view('pages.detailBuku_User', compact('buku'));
        } else {
            return redirect()->back();
        }
    }

    // public function kategori($kategori)
    // {
    //     $buku = Buku::where('kategori', ($kategori))->get();
    //     return view('pages.kategori', compact('buku'));
    // }

    public function novel(Request $request)
    {
        if ($request->nama || $request->filter) {
            if ($request->filter == 'populer') {
                $novels = Buku::where('kategori', 'Novel')
                    ->orderBy('total_pinjam', 'desc')
                    ->get();
            } elseif ($request->filter == 'ebook') {
                $novels = Buku::where('kategori', 'Novel')
                    ->where('link_ebook', '!=', null)
                    ->get();
            }

            if($request->nama) {
                $novels = Buku::where('kategori', 'Novel')
                    ->where('nama', 'LIKE', '%' . $request->nama . '%')
                    ->get();
            }
        } else {
                $novels = Buku::where('kategori', 'Novel')->get();
        }

        return view('pages.kategoriNovel_User', compact('novels'));
    }

    public function manga(Request $request)
    {
        if ($request->nama || $request->filter) {
            if ($request->filter == 'populer') {
                $mangas = Buku::where('kategori', 'Manga')
                    ->orderBy('total_pinjam', 'desc')
                    ->get();
            } elseif ($request->filter == 'ebook') {
                $mangas = Buku::where('kategori', 'Manga')
                    ->where('link_ebook', '!=', null)
                    ->get();
            }

            if($request->nama) {
                $mangas = Buku::where('kategori', 'Manga')
                    ->where('nama', 'LIKE', '%' . $request->nama . '%')
                    ->get();
            }
        } else {
                $mangas = Buku::where('kategori', 'Manga')->get();
        }

        return view('pages.kategoriManga_User', compact('mangas'));
    }

    public function study(Request $request)
    {
        $studys = Buku::where('kategori', 'Study')->get();

        if ($request->nama || $request->filter) {
            if ($request->filter == 'populer') {
                $studys = Buku::where('kategori', 'Study')
                    ->orderBy('total_pinjam', 'desc')
                    ->get();
            } elseif ($request->filter == 'ebook') {
                $studys = Buku::where('kategori', 'Study')
                    ->where('link_ebook', '!=', null)
                    ->get();
            }

            if($request->nama) {
                $studys = Buku::where('kategori', 'Study')
                    ->where('nama', 'LIKE', '%' . $request->nama . '%')
                    ->get();
            }
        } else {
                $studys = Buku::where('kategori', 'Study')->get();
        }

        return view('pages.kategoriStudy_User', compact('studys'));
    }
}
