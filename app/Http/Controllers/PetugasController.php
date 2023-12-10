<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booklist;

class PetugasController extends Controller
{
    public function petugas() {
        return view('petugas');
    }

    public function memberlist() {
        return view('memberlist');
    }

    public function booklist() {
        return view('booklist/booklist');
    }

    public function booklisttable() {
        return view('booklist/booklist-table');
    }

    public function addbooklist() {
        return view('booklist/add-booklist');
    }

    public function storebooklist(Request $request)
    {
      Booklist::create([
        $file = $request->file('cover'),
        $nama_file = time()."_".$file->getClientOriginalName(),
        $tujuan_upload = 'data_cover',
        $file->move($tujuan_upload,$nama_file),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'genre' => $request->genre,
            'cover'=>$nama_file,
      ]);

     

        session()->flash('success', 'Data berhasil di Simpan');
        return redirect('berandaalumni');
     }

    public function viewbooklist($id) {
        $booklist=Booklist::find($id);
        return view('booklist/booklist')->with('booklist', $booklist);
    }

    public function editbooklist($id) {
        $booklist=Booklist::findOrFail($id);
        return view('booklist/edit-booklist')->with('booklist', $booklist);;
    }

    public function delete($id)
    {
        Booklist::destroy($id);
        session()->flash('delete', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function rentlist() {
        return view('rentlist');
    }

    public function notif() {
        return view('notif');
    }

    public function accountinfo() {
        return view('accountinfo');
    }
}
