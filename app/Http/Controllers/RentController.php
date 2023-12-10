<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\RentLogs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Termwind\Components\Raw;

class RentController extends Controller
{
    public function dikembalikanIndex(Request $request)
    {
        if ($request->namaPeminjam || $request->nama) {
            if ($request->namaPeminjam) {
                $rent = RentLogs::where('status', 'Dikembalikan')
                    ->where('hari_terlambat', null)
                    ->where('denda', null)
                    ->orderBy('dikembalikan', 'desc')
                    ->whereHas('users', function ($q) use ($request) {
                        $q->where('nama', 'LIKE', '%' . $request->namaPeminjam . '%');
                    })
                    ->paginate(100);
            } else {
                $rent = RentLogs::where('status', 'Dikembalikan')->where('hari_terlambat', null)->where('denda', null)->orderBy('dikembalikan', 'desc')->paginate(5);
            }

            if ($request->nama) {
                $terlambat = RentLogs::where('status', 'Dikembalikan')
                    ->where('hari_terlambat', '!=', null)
                    ->where('denda', '!=', null)
                    ->whereHas('users', function ($q) use ($request) {
                        $q->where('nama', 'LIKE', '%' . $request->nama . '%');
                    })
                    ->get();
            } else {
                $terlambat = RentLogs::where('status', 'Dikembalikan')->where('hari_terlambat', '!=', null)->where('denda', '!=', null)->get();
            }
        } else {
            $rent = RentLogs::where('status', 'Dikembalikan')->where('hari_terlambat', null)->where('denda', null)->orderBy('dikembalikan', 'desc')->paginate(5);
            $terlambat = RentLogs::where('status', 'Dikembalikan')->where('hari_terlambat', '!=', null)->where('denda', '!=', null)->get();
        }




        return view('pages.admin.catatanPeminjaman.peminjaman.dikembalikan', compact('rent', 'terlambat'));
    }




    public function pinjamBuku($slug)
    {
        $buku = Buku::where('slug', $slug)->first();

        $kode = Auth::user()->slug . Str::random(8);
        $tanggalPinjam = Carbon::now()->toDateString();
        $tanggalKembali = Carbon::parse($tanggalPinjam)->addDays(5)->toDateString();

        $user = User::where('id', Auth::user()->id)->first();
        $user->buku_id = $buku->id;
        $user->save();

        $data = [
            'kode' => $kode,
            'user_id' => Auth::user()->id,
            'buku_id' => $buku->id,
            'tanggal_pinjam' => $tanggalPinjam,
            'tanggal_kembali' => $tanggalKembali,
            'status' => 'Butuh Persetujuan',
        ];

        RentLogs::create($data);

        return redirect('/histori-peminjaman/' . Auth::user()->slug)->with('status', 'BUTUH PERSETUJUAN DARI PETUGAS');
    }




    public function butuhPersetujuan(Request $request)
    {

        if ($request->nama) {
            $perizinan = RentLogs::where('status', 'Butuh Persetujuan')->whereHas('buku')->whereHas('users', function ($q) use ($request) {
                $q->where('nama', 'LIKE', '%' . $request->nama . '%');
            })->get();
        } else {
            $perizinan = RentLogs::where('status', 'Butuh Persetujuan')->whereHas('buku')->whereHas('users')->get();
        }

        return view('pages.admin.catatanPeminjaman.peminjaman.butuhPersetujuan', compact('perizinan'));
    }

    public function peminjamanSetuju($kode)
    {
        $rent = RentLogs::where('kode', $kode)->whereHas('users')->whereHas('buku')->first();
        $buku = Buku::where('id', $rent->buku->id)->first();
        $user = User::where('id', $rent->users->id)->first();


        $buku->total_pinjam += 1;
        $buku->save();

        // $user->buku_id = $buku->id;
        // $user->save();

        $rent->status = 'Dipinjam';
        $rent->save();

        return redirect('/catatan-butuh-persetujuan')->with('status', 'PEMINJAMAN TELAH AKTIF');
    }

    public function qrButuhPersetujuan(Request $request)
    {
        $rent = RentLogs::Where('kode', $request->qr_code)->where('status', 'Butuh Persetujuan')->whereHas('users')->whereHas('buku')->first();

        if ($rent) {
            $buku = Buku::where('id', $rent->buku->id)->first();
            $buku->total_pinjam += 1;
            $buku->save();

            $rent->status = 'Dipinjam';
            $rent->save();

            return response()->json([
                'status' => true,
                'message' => 'BERHASIL!',
                'rent' => $rent
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'INVALID QR CODE! SILAHKAN SCAN ULANG!'
            ]);
        }
    }







    public function peminjamanTidakSetuju($kode)
    {
        $rent = RentLogs::where('kode', $kode)->whereHas('users')->whereHas('buku')->first();
        $rent->delete();

        $rent->users->buku_id = null;
        $rent->users->save();

        return redirect('/catatan-butuh-persetujuan')->with('failed', 'PEMINJAMAN GAGAL');
    }








    public function dipinjamIndex(Request $request)
    {
        if ($request->nama) {
            $rent = RentLogs::where('status', 'Dipinjam')->whereHas('buku')
                ->whereHas('users', function ($q) use ($request) {
                    $q->where('nama', 'LIKE', '%' . $request->nama . '%');
                })
                ->get();
        } else {
            $rent = RentLogs::where('status', 'Dipinjam')->whereHas('buku')->whereHas('users')->get();
        }


        return view('pages.admin.catatanPeminjaman.peminjaman.dipinjam', compact('rent'));
    }

    public function dipinjamSelesai($kode)
    {
        $rent = RentLogs::where('kode', $kode)->where('status', 'Dipinjam')->whereHas('buku')->whereHas('users')->first();

        $tanggal = Carbon::now()->toDateString();


        if ($tanggal > $rent->tanggal_kembali) {
            $rent->status = 'Terlambat';
            $rent->save();
            return redirect('/catatan-terlambat')->with('failed', 'PEMINJAMAN TERLAMBAT');
        } else {
            $rent->users->buku_id = null;
            $rent->users->save();

            $rent->status = 'Dikembalikan';
            $rent->dikembalikan = $tanggal;
            $rent->save();

            return redirect('/catatan-dipinjam')->with('status', 'PEMINJAMAN TELAH SELESAI');
        }
    }


    public function qrDipinjam(Request $request)
    {
        $rent = RentLogs::Where('kode', $request->qr_code)->where('status', 'Dipinjam')->whereHas('users')->whereHas('buku')->first();

        if ($rent) {
            $tanggal = Carbon::now()->toDateString();

            if ($tanggal > $rent->tanggal_kembali) {
                $rent->status = 'Terlambat';
                $rent->save();

                return response()->json([
                    'status' => 'terlambat',
                    'message' => 'BERHASIL!',
                    'rent' => $rent
                ]);
            } else {
                $rent->users->buku_id = null;
                $rent->users->save();

                $rent->status = 'Dikembalikan';
                $rent->dikembalikan = $tanggal;
                $rent->save();

                return response()->json([
                    'status' => true,
                    'message' => 'BERHASIL!',
                    'rent' => $rent
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'INVALID QR CODE! SILAHKAN SCAN ULANG!'
            ]);
        }
    }




    public function terlambatIndex(Request $request)
    {
        if ($request->nama) {
            $rent = RentLogs::where('status', 'Terlambat')
                ->whereHas('buku')
                ->whereHas('users', function($q) use($request) {
                    $q->where('nama', 'LIKE', '%'. $request->nama .'%');
                })
                ->get();
        } else {
            $rent = RentLogs::where('status', 'Terlambat')->whereHas('buku')->whereHas('users')->get();
        }


        foreach ($rent as $item) {
            $tanggalKembali = Carbon::parse($item->tanggal_kembali);
            $tanggalSekarang = Carbon::now();

            // Hitung hari terlambat
            $hariTerlambat = $tanggalKembali->diffInDays($tanggalSekarang);
            $item->hari_terlambat = $hariTerlambat;

            // Hitung total denda
            $totalDenda = $hariTerlambat * 5000;
            $item->total_denda = $totalDenda;
        }

        return view('pages.admin.catatanPeminjaman.pelanggaran.terlambat', compact('rent'));
    }



    public function terlambatSelesai($kode)
    {
        $rent = RentLogs::where('status', 'Terlambat')->where('kode', $kode)->whereHas('buku')->whereHas('users')->first();

        $tanggalKembali = Carbon::parse($rent->tanggal_kembali);
        $tanggalSekarang = Carbon::now();

        $hariTerlambat = $tanggalKembali->diffInDays($tanggalSekarang);
        $totalDenda = $hariTerlambat * 5000;

        $rent->users->buku_id = null;
        $rent->users->save();

        $rent->hari_terlambat = $hariTerlambat;
        $rent->denda = $totalDenda;
        $rent->dikembalikan = Carbon::now()->toDateString();
        $rent->status = 'Dikembalikan';
        $rent->save();

        return redirect('/catatan-terlambat')->with('status', 'TERLAMBAT SELESAI');
    }

    public function qrTerlambat(Request $request)
    {
        $rent = RentLogs::Where('kode', $request->qr_code)->where('status', 'Terlambat')->whereHas('users')->whereHas('buku')->first();

        if ($rent) {
            $tanggalKembali = Carbon::parse($rent->tanggal_kembali);
            $tanggalSekarang = Carbon::now();

            $hariTerlambat = $tanggalKembali->diffInDays($tanggalSekarang);
            $totalDenda = $hariTerlambat * 5000;

            $rent->users->buku_id = null;
            $rent->users->save();

            $rent->hari_terlambat = $hariTerlambat;
            $rent->denda = $totalDenda;
            $rent->dikembalikan = Carbon::now()->toDateString();
            $rent->status = 'Dikembalikan';
            $rent->save();

            return response()->json([
                'status' => true,
                'message' => 'PEMINJAMAN TERLAMBAT TELAH SELESAI',
                'rent' => $rent,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'INVALID QR CODE! SILAHKAN SCAN ULANG!'
            ]);
        }
    }







    public function rusakSelesai(Request $request, $kode)
    {
        $rent = RentLogs::where('kode', $kode)->whereHas('users')->whereHas('buku')->first();
        $denda = (int) preg_replace('/[^0-9]/', '', $request->denda);

        $rent->denda = $denda;
        $rent->dikembalikan = Carbon::now()->toDateString();
        $rent->status = 'Rusak';
        $rent->save();

        $rent->users->buku_id = null;
        $rent->users->save();

        return redirect('/catatan-dipinjam')->with('status', 'TOTAL DENDA RUSAK TELAH DIKIRIM');
    }

    public function rusakIndex(Request $request)
    {
        if ($request->nama) {
            $rent = RentLogs::where('status', 'Rusak')
                ->whereHas('buku')
                ->whereHas('users', function($q) use($request) {
                    $q->where('nama', 'LIKE', '%'. $request->nama .'%');
                })
                ->get();
        } else {
            $rent = RentLogs::where('status', 'Rusak')->whereHas('buku')->whereHas('users')->get();
        }

        return view('pages.admin.catatanPeminjaman.pelanggaran.rusak', compact('rent'));
    }












    public function hilangSelesai(Request $request, $kode)
    {
        $rent = RentLogs::where('kode', $kode)->whereHas('users')->whereHas('buku')->first();
        $denda = (int) preg_replace('/[^0-9]/', '', $request->denda);

        $rent->denda = $denda;
        $rent->dikembalikan = Carbon::now()->toDateString();
        $rent->status = 'Hilang';
        $rent->save();

        $rent->users->buku_id = null;
        $rent->users->save();

        return redirect('/catatan-dipinjam')->with('status', 'TOTAL DENDA HILANG TELAH DIKIRIM');
    }


    public function hilangIndex(Request $request)
    {
        if ($request->nama) {
            $rent = RentLogs::where('status', 'Hilang')
                ->whereHas('buku')
                ->whereHas('users', function($q) use($request) {
                    $q->where('nama', 'LIKE', '%'. $request->nama .'%');
                })
                ->get();
        } else {
            $rent = RentLogs::where('status', 'Hilang')->whereHas('buku')->whereHas('users')->get();
        }
        return view('pages.admin.catatanPeminjaman.pelanggaran.hilang', compact('rent'));
    }
}
