<?php

namespace App\Http\Controllers;

use App\Events\BorrowEvent;
use App\Events\FineEvent;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function home(Request $request) {

        $books = Book::where('book_type', 'book')->get();
        $ebooks = Book::where('book_type', 'ebook')->get();

        if (Auth::check()) {

            $query = $request->input('q');

            if ($query) {
                $book = Book::where('title', 'like', '%' . $query . '%')->get();

                return view('home', compact('book'));
            }

            return view('home', compact('books', 'ebooks'));
        }

        return view('home', compact('books', 'ebooks'));
    }

    public function myaccount() {

        $borrows = Borrow::with(['user', 'book'])
            ->select('id', 'kode', 'book_id', 'user_id', 'created_at', 'deadline', 'returned')
            ->where('user_id', Auth::id())
            ->orderByRaw('IFNULL(returned, 1), returned ASC') // Mengurutkan 'returned' yang null terlebih dahulu, kemudian 'returned' yang tidak null secara ascending
            ->orderBy('deadline', 'asc') // Mengurutkan berdasarkan 'deadline' secara ascending
            ->get();

        return view('myaccount', compact('borrows'));
    }

    public function myaccountAction(Request $request){
        User::find($request->id)->update([
            'nis' => $request->nis,
            'name' => $request->nama,
            'major' => $request->jurusan,
            'class' => $request->kelas,
            'credentials' => true
        ]);

        return redirect('/');
    }

    public function scan(Request $request) {
        if (!Auth::user()->isAdmin) {
            return abort(404);
        }

        if ($request->has(['book', 'user', 'scanID', 'type'])) {

            $currentDay = date("Y-m-d");

            $newDate = date("Y-m-d", strtotime($currentDay . "+7 days"));

            if ($request->type == "borrow") {

                Borrow::create([
                    'kode' => $request->scanID,
                    'book_id' => $request->book,
                    'user_id' => $request->user,
                    'deadline' => $newDate,
                ]);

            } elseif ($request->type == "return") {
                $borrow = Borrow::where('kode', $request->book);

                $borrowGet = $borrow->get();

                if (strtotime($borrowGet[0]['deadline']) < time()) {

                    $startDate = new DateTime($borrowGet[0]['deadline']);
                    $endDate = new DateTime();

                    $interval = $startDate->diff($endDate);
                    $formatted = $interval->format('%a');
                    $denda = $formatted * 50000;

                    // event(new BorrowEvent($request->scanID, $denda, "telat"  ));
                    event(new FineEvent($request->scanID, $formatted, $denda));

                    $borrow->update([
                        'returned' => $currentDay
                    ]);

                    return redirect("/fine?telat=$formatted&denda=$denda");
                    
                }

                $borrow->update([
                    'returned' => $currentDay
                ]);
            }

            event(new BorrowEvent($request->scanID, date("d F Y", strtotime($newDate)), $request->type  ));

            return redirect('/admin');
        }

        return view('scan');
    }

    public function report() {
        if (!Auth::user()->isAdmin) {
            return abort(404);
        }
        
        $borrows = Borrow::with(['user', 'book'])
            ->select('id', 'kode', 'book_id', 'user_id', 'created_at', 'deadline', 'returned')
            ->orderByRaw('IFNULL(returned, 1), returned ASC') // Mengurutkan 'returned' yang null terlebih dahulu, kemudian 'returned' yang tidak null secara ascending
            ->orderBy('deadline', 'asc') // Mengurutkan berdasarkan 'deadline' secara ascending
            ->get();

        // Iterasi melalui hasil peminjaman
        // foreach ($borrows as $borrow) {
            // Mengakses informasi terkait buku dan pengguna tanpa menimbulkan masalah N+1
            // $title = $borrow->book->title;
            // $userName = $borrow->user->name;
            // $borrowDate = $borrow->created_at;
            // $deadline = $borrow->deadline;
            // $returned = $borrow->returned;
        // }
        
        return view('report', compact('borrows'));
    }

    public function fine(Request $request) {

        return view('fine', [
            'telat' => $request->telat,
            'denda' => $request->denda 
        ]);

    }
}