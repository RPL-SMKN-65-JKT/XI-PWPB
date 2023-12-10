<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\RentLogs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $user = User::where('role_id', '3')->get();
        $books = Book::all();
        return view('book-rent', [
            'user' => $user,
            'books' => $books
        ]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(7)->toDateString();


        $book = Book::findOrFail($request->book_id)->only('status');

        if ($book['status'] != 'in stock') {
            Session::flash('gagal', 'Tidak bisa meminjam buku,Buku sedang dipinjam');
            Session::flash('alert', 'alert-danger');
            return redirect('book-rent');
        } else {
            $counts = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if ($counts >= 3) {
                Session::flash('limit', 'Tidak bisa meminjam buku,user sudah mencapai limit meminjam buku');
                Session::flash('alert', 'alert-danger');
                return redirect('book-rent');
            } else {
                try {
                    DB::beginTransaction();
                    // berhasil meminjam,masukan data ke rent-logs
                    RentLogs::create($request->all());

                    //proses update stock buku jadi not in stock kalau dipinjam
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'not in stock';
                    $book->save();
                    DB::commit();

                    return redirect('rentlogs')->with('berhasil', 'Buku Berhasil Dipinjam');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }

    public function return()
    {
        $user = User::where('role_id', '3')->get();
        $books = Book::all();
        return view('book-return', [
            'user' => $user,
            'books' => $books
        ]);
    }

    public function ReturnBook(Request $request)
    {
        // user & buku yang dipilih untuk di return benar maka berhasil return
        $rent = RentLogs::where('user_id', $request->user_id)
            ->where('book_id', $request->book_id)
            ->where('actual_return_date', null);

        $rentData = $rent->first();
        $countData = $rent->count();

        // jika benar buku dan user yang meminjam buku itu blum mengembalikan dan ingin mengembalikan buku
        if ($countData == 1) {
            try {
                DB::beginTransaction();

                // kita akan mengembalikan buku
                $rentData->actual_return_date = Carbon::now()->toDateString();
                $rentData->save();

                // proses update status buku jadi 'in stock' setelah dikembalikan
                $book = Book::findOrFail($request->book_id);
                $book->status = 'in stock';
                $book->save();

                DB::commit();

                return redirect('book-return')->with('berhasil', 'Buku berhasil dikembalikan');
            } catch (\Throwable $th) {
                DB::rollBack();
                // Handle the exception if needed
                return redirect('book-return')->with('gagal', 'Gagal mengembalikan buku');
            }
        } else {
            // error
            return redirect('book-return')->with('gagal', 'Tidak ada data peminjaman user / buku ini');
        }
    }


    // public function ReturnBook(Request $request)

    // {
    //     //user & buku yang dipilih untuk di return benar maka berhasil return
    //     $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_return_date', null);
    //     $rentData = $rent->first();
    //     $countData = $rent->count();

    //     //jika benar buku dan user yang meminjam buku itu blum mengembalikan dan ingin mengembalikan buku
    //     if ($countData == 1) {
    //         //kita akan mengembalikan buku
    //         $rentData->actual_return_date = Carbon::now()->toDateString();

    //         $rentData->save();

    //         return redirect('book-return')->with('berhasil', 'Buku berhasil di kembalikan');
    //     } else {
    //         //error 
    //         return redirect('book-return')->with('gagal', 'Tidak ada data peminjaman user / buku ini');
    //     }


    //     //jika user dan buku yang dipilih untuk di return salah maka muncul eror 

    // }
}
