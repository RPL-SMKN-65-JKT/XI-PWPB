<?php

namespace App\Http\Controllers;

use App\Models\AcceptEbook;
use App\Models\Buku;
use App\Models\Ebook;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class EbookController extends Controller
{
    public function ebookIndex(Request $request)
    {
        if ($request->pengizin || $request->nama) {
            if ($request->pengizin) {
                $perizinan = AcceptEbook::whereHas('buku')
                    ->whereHas('users', function ($q) use ($request) {
                        $q->where('nama', 'LIKE', '%' . $request->pengizin . '%');
                    })
                    ->where('status', 'proses-izin')
                    ->get();
            } else {
                $perizinan = AcceptEbook::whereHas('buku')->whereHas('users')->where('status', 'proses-izin')->get();
            }

            if ($request->nama) {
                $ebook = Ebook::whereHas('users', function ($q) use ($request) {
                        $q->where('nama', 'LIKE', '%' . $request->nama . '%');
                    })
                    ->whereHas('buku')
                    ->orderByRaw("FIELD(status, 'Siap Download', 'Selesai')")
                    ->orderBy('created_at', 'desc')
                    ->get();
            } else {
                $ebook = Ebook::whereHas('users')->whereHas('buku')
                    ->orderByRaw("FIELD(status, 'Siap Download', 'Selesai')")
                    ->orderBy('created_at', 'desc')
                    ->get();
            }
        } else {
            $perizinan = AcceptEbook::whereHas('buku')->whereHas('users')->where('status', 'proses-izin')->get();
            $ebook = Ebook::whereHas('users')->whereHas('buku')
                ->orderByRaw("FIELD(status, 'Siap Download', 'Selesai')")
                ->orderBy('created_at', 'desc')
                ->get();
        }


        return view('pages.admin.catatanEbook.ebookIndex', compact('perizinan', 'ebook'));
    }
    public function ebookSetuju($id, Request $request)
    {
        $perizinan = AcceptEbook::where('id', $id)->whereHas('buku')->whereHas('users')->first();
        $perizinan->users->izin_ebook = 'true';
        $perizinan->users->update();

        $data = [
            'kode'    => $perizinan->users->username . Str::random(8),
            'user_id' => $perizinan->users->id,
            'buku_id' => $perizinan->buku->id,
            'tanggal_izin' => $perizinan->tanggal,
            'status'  => 'Siap Download',
        ];

        Ebook::create($data);
        $perizinan->delete();

        return redirect('/catatan-ebook')->with('status', 'PERIZINAN EBOOK BERHASIL');
    }

    public function ebookTidakSetuju($id, Request $request)
    {
        $perizinan = AcceptEbook::where('id', $id)->whereHas('buku')->whereHas('users')->first();
        $perizinan->users->izin_ebook = 'false';
        $perizinan->users->update();

        $perizinan->delete();

        return redirect('/catatan-ebook')->with('failed', 'PERIZINAN EBOOK GAGAL');
    }




    public function izinEbook(Request $request, $slug)
    {
        $user = User::where('slug', Auth::user()->slug)->first();
        $user->izin_ebook = 'proses-izin';
        $user->update();

        $buku = Buku::where('slug', $slug)->first();

        $data = [
            'user_id' => $user->id,
            'buku_id' => $buku->id,
            'tanggal' => Carbon::now()->toDateString(),
            'status'  => 'proses-izin'
        ];

        AcceptEbook::create($data);
        return redirect('/histori-perizinan-ebook/' . Auth::user()->slug)->with('status', 'PERIZINAN BERHASIL DIBUAT');
    }

    public function downloadEbook(Request $request, $slug)
    {
        $buku = Buku::where('slug', $slug)->first();
        $ebook = Ebook::where('status', 'Siap Download')->where('user_id', Auth::user()->id)->whereHas('users')->first();

        $ebook->buku_id = $buku->id;
        $ebook->status = 'Selesai';
        $ebook->tanggal_izin = Carbon::now()->toDateString();
        $ebook->update();

        $ebook->users->izin_ebook = 'false';
        $ebook->users->update();

        $buku->total_download += 1;
        $buku->update();

        return redirect($buku->link_ebook);
    }
}
