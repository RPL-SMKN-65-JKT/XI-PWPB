<?php

namespace App\Http\Controllers;

use App\Models\AcceptEbook;
use App\Models\Ebook;
use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function dUser(Request $request)
    {

        if ($request->nama && $request->role) {
            $users = User::whereHas('roles', function ($i) use ($request) {
                $i->where('name', $request->role);
            })->where('nama', 'LIKE', '%' . $request->nama . '%')->get();
        } elseif ($request->nama) {
            $users = User::orderByRaw('FIELD(role_id, 1, 2)')->get();
        } elseif ($request->role) {
            if ($request->role == 'Admin') {
                $users = User::where('role_id', 1)->get();
            } elseif ($request->role == 'User') {
                $users = User::where('role_id', 2)->get();
            } else {
                $users = User::orderByRaw('FIELD(role_id, 1, 2)')->get();
            }
        } else {
            $users = User::orderByRaw('FIELD(role_id, 1, 2)')->get();
        }
        return view('pages.admin.dUser', compact('users'));
    }

    public function detailUser($slug)
    {
        $user = User::where('slug', $slug)->first();
        if ($user->id != Auth::user()->id && $user->role_id == 1) {
            return back()->with('failed', 'TIDAK BISA MELIHAT AKUN ADMIN LAIN');
        } else {
            $rents = RentLogs::where('user_id', $user->id)->get();
            $ebooks = Ebook::where('user_id', $user->id)->get();
            return view('pages.admin.user.detailUser', compact('user', 'rents', 'ebooks'));
        }
    }


    public function editUser($slug)
    {
        $user = User::where('slug', $slug)->first();
        if ($user->id != Auth::user()->id && $user->role_id == 1) {
            return back()->with('failed', 'TIDAK BISA EDIT AKUN ADMIN LAIN');
        } else {
            return view('pages.admin.user.editUser', compact('user'));
        }
    }

    public function editUserProcess(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();

        if ($user->id != Auth::user()->id && $user->role_id == 1) {
            return redirect('daftar-user')->with('failed', 'TIDAK BISA EDIT AKUN ADMIN LAIN');
        } else {
            $data = $request->validate([
                'username' => 'required|min:6|unique:users,username,' . $user->id,
                'nama'     => 'required',
                'email'      => 'required|unique:users,email,' . $user->id,
                'telepon'  => 'required|min:8|unique:users,telepon,' . $user->id,
                'foto'  => '',
                'alamat'  => 'required',
            ]);

            $gambarSebelum = $user->foto;

            if ($request->password) {
                $user->password = Hash::make($request->password);
            }

            if ($request->hasFile('foto')) {
                if ($gambarSebelum) {
                    Storage::delete($gambarSebelum);
                }
                $uploadedFile = $request->file('foto');
                $originalName = $uploadedFile->getClientOriginalName();
                $extension = $uploadedFile->getClientOriginalExtension();

                // Generate nama file baru berdasarkan nama_tanggal.extension
                $newFileName = $data['username'] . '_' . now()->format('Ymd') . '.' . $extension;

                // Simpan file dengan nama baru
                $gambarPath = $uploadedFile->storeAs('users', $newFileName);
                $path = $gambarPath;
                $user->foto = $path;
            }

            // Update attributes
            $user->username = $request->username;
            $user->nama = $request->nama;
            $user->email = $request->email;
            $user->telepon = $request->telepon;
            $user->alamat = $request->alamat;
            $user->role_id = $request->role_id;

            $user->slug = null;
            $user->update();

            return redirect('/daftar-user')->with('status', 'AKUN USER BERHASIL DIPERBARUI');
        }
    }


    public function deleteUser(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();

        if ($user->id != Auth::user()->id && $user->role_id == 1) {
            return redirect('daftar-user')->with('failed', 'TIDAK BISA MENGHAPUS AKUN ADMIN LAIN');
        } else {
            $rent = RentLogs::where('user_id', $user->id)->get();
            $acceptEbook = AcceptEbook::where('user_id', $user->id)->get();
            $ebook = Ebook::where('user_id', $user->id)->get();


            if ($rent->count() > 0) {
                foreach ($rent as $item) {
                    $item->delete();
                }
            }

            if ($acceptEbook->count() > 0) {
                foreach ($acceptEbook as $item) {
                    $item->delete();
                }
            }

            if ($ebook->count() > 0) {
                foreach ($ebook as $item) {
                    $item->delete();
                }
            }

            $gambarSebelum = $user->foto;


            if ($gambarSebelum) {
                Storage::delete($gambarSebelum);
            }

            $user->delete();

            return redirect('/daftar-user')->with('status', 'USER BERHASIL DIHAPUS');
        }


        // return response()->json([
        //     'status' => 200,
        //     'message' => 'BERHASIL'
        // ]);
    }
















    public function profile()
    {
        dd('ini profile');
    }

    public function profileIndex($slug)
    {
        $user = User::where('slug', Auth::user()->slug)->first();
        $pinjamCount = RentLogs::where('user_id', $user->id)->where('status', 'Dikembalikan')->count();
        $pelanggaranCount = RentLogs::where('user_id', $user->id)->where('denda', '!=', null)->count();

        if ($slug != $user->slug) {
            return redirect()->back();
        } else {
            return view('pages.user.profile', compact('user', 'pinjamCount', 'pelanggaranCount'));
        }
    }


    public function profileEdit(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();

        $data = $request->validate([
            'username' => 'required|min:6|unique:users,username,' . $user->id,
            'nama'     => 'required',
            'email'      => 'required|unique:users,email,' . $user->id,
            'telepon'  => 'required|min:8|unique:users,telepon,' . $user->id,
            'foto'  => '',
            'alamat'  => 'required',
        ]);

        $gambarSebelum = $user->foto;

        if ($request->hasFile('foto')) {
            if ($gambarSebelum) {
                Storage::delete($gambarSebelum);
            }
            $uploadedFile = $request->file('foto');
            $originalName = $uploadedFile->getClientOriginalName();
            $extension = $uploadedFile->getClientOriginalExtension();

            // Generate nama file baru berdasarkan nama_tanggal.extension
            $newFileName = $data['username'] . '_' . now()->format('Ymd') . '.' . $extension;

            // Simpan file dengan nama baru
            $gambarPath = $uploadedFile->storeAs('users', $newFileName);
            $data['foto'] = $gambarPath;
        }

        // Update attributes
        $user->slug = null;
        $user->update($data);

        return redirect('/setting/' . $request->username)->with('status', 'PROFIL BERHASIL DIPERBARUI');
    }








    public function indexHistori(Request $request)
    {
        $perizinan = RentLogs::where('user_id', Auth::user()->id)->where('status', 'Butuh Persetujuan')->whereHas('buku')->whereHas('users')->first();
        $dipinjam = RentLogs::where('user_id', Auth::user()->id)->where('status', 'Dipinjam')->whereHas('buku')->whereHas('users')->first();

        if ($request->filter || $request->nama) {
            if ($request->filter) {
                $rent = RentLogs::where('user_id', Auth::user()->id)
                    ->where('status', 'Dikembalikan')
                    ->where('hari_terlambat', null)
                    ->where('denda', null)
                    ->orderBy('created_at', 'desc')
                    ->whereHas('buku', function ($q) use ($request) {
                        $q->where('kategori', $request->filter);
                    })
                    ->get();
            }

            if ($request->nama) {
                $rent = RentLogs::where('user_id', Auth::user()->id)
                    ->where('status', 'Dikembalikan')
                    ->where('hari_terlambat', null)
                    ->where('denda', null)
                    ->orderBy('created_at', 'desc')
                    ->whereHas('buku', function ($q) use ($request) {
                        $q->where('nama', 'LIKE', '%' . $request->nama . '%');
                    })
                    ->get();
            }
        } else {
            $rent = RentLogs::where('user_id', Auth::user()->id)
                ->where('status', 'Dikembalikan')
                ->where('hari_terlambat', null)
                ->where('denda', null)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('pages.user.historiPeminjaman', compact('perizinan', 'dipinjam', 'rent'));
        // dd($perizinan);
    }

    public function indexPelanggaran(Request $request)
    {
        $terlambat = RentLogs::where('user_id', Auth::user()->id)->where('status', 'Terlambat')->whereHas('buku')->whereHas('users')->first();

        if ($request->filter || $request->nama) {
            if ($request->filter) {
                $pelanggaran = RentLogs::where('user_id', Auth::user()->id)
                    ->where('denda', '!=', null)
                    ->orderBy('created_at', 'desc')
                    ->whereHas('buku', function ($q) use ($request) {
                        $q->where('kategori', $request->filter);
                    })
                    ->get();
            }

            if ($request->nama) {
                $pelanggaran = RentLogs::where('user_id', Auth::user()->id)
                    ->where('denda', '!=', null)
                    ->orderBy('created_at', 'desc')
                    ->whereHas('buku', function ($q) use ($request) {
                        $q->where('nama', 'LIKE', '%' . $request->nama . '%');
                    })
                    ->get();
            }
        } else {
            $pelanggaran = RentLogs::where('user_id', Auth::user()->id)
                ->where('denda', '!=', null)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('/pages.user.historiPelanggaran', compact('pelanggaran', 'terlambat'));
        // dd($perizinan);
    }

    public function indexPerizinanEbook(Request $request)
    {

        $perizinan = AcceptEbook::where('user_id', Auth::user()->id)->whereHas('buku')->whereHas('users')->where('status', 'proses-izin')->first();
        $siapdownload = Ebook::where('user_id', Auth::user()->id)->whereHas('buku')->whereHas('users')->where('status', 'Siap Download')->first();

        $ebook = Ebook::where('user_id', Auth::user()->id)->where('status', 'Selesai')->whereHas('users')->whereHas('buku')->get();

        if ($request->filter || $request->nama) {
            if ($request->filter) {
                $ebook = Ebook::where('user_id', Auth::user()->id)
                    ->where('status', 'Selesai')
                    ->whereHas('users')
                    ->whereHas('buku', function ($q) use ($request) {
                        $q->where('kategori', $request->filter);
                    })
                    ->get();
            }

            if ($request->nama) {
                $ebook = Ebook::where('user_id', Auth::user()->id)
                    ->where('status', 'Selesai')
                    ->whereHas('users')
                    ->whereHas('buku', function ($q) use ($request) {
                        $q->where('nama', 'LIKE', '%' . $request->nama . '%');
                    })
                    ->get();
            }
        } else {
            $ebook = Ebook::where('user_id', Auth::user()->id)
                ->where('status', 'Selesai')
                ->whereHas('users')
                ->whereHas('buku')
                ->get();
        }

        return view('/pages.user.historiPerizinanEbook', compact('perizinan', 'ebook', 'siapdownload'));
        // dd($perizinan);
    }
}
