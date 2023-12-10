<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function showBooks() {
        if (Auth::check()) {

            if (!Auth::user()->isAdmin) {
                $books = Book::where('book_type', 'book')->get();

                return view('morebook', compact('books'));
                
            }
    
            return view('books', [
                'books' => Book::all()
            ]);

        } 

        $books = Book::where('book_type', 'book')->get();

        return view('morebook', compact('books'));

    }

    public function showEbooks() {
        $books = Book::where('book_type', 'ebook')->get();

        return view('morebook', compact('books'));
    }
    

    // public function showBook(Book $book) {

    //     if (!Auth::user()->isAdmin) {
    //         return abort(404);
    //     }

    //     return view('book', [
    //         'book' => $book
    //     ]);

    // }

    public function addBook(){

        if (!Auth::user()->isAdmin) {
            return abort(404);
        }

        return view('addbook');

    }

    public function bookDetails(Book $book) {

        return view('details', [
            'book' => $book
        ]);

    }

    public function actionAddBook(Request $request){

        if (!Auth::user()->isAdmin) {
            return abort(404);
        }

        $validator = Validator::make($request->all(), [
            'cover' => 'required|mimes:jpeg,png,webp,jpg',
            'ebook_file' => 'required|mimes:pdf'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $cover_path = "";
        if ($request->hasFile('cover')) {
            global $cover_path;
            
            $file = $request->file('cover');

            $cover_name = Str::random(9);
            $cover_path = 'public/books/covers/';
            
            
            $file->storeAs($cover_path, $cover_name);

            $cover_path = '/books/covers/' . $cover_name;
        }

        $ebook_file_path = "";
        if ($request->hasFile('ebook_file')) {
            global $ebook_file_path;
            
            $file = $request->file('ebook_file');

            $ebook_file_name = Str::random(9);
            $ebook_file_path = 'public/ebook/file/';
            
            
            $file->storeAs($ebook_file_path, $ebook_file_name);

            $ebook_file_path = '/ebook/file/' . $ebook_file_name;
        }

        Book::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'cover' => $cover_path,
            'ebook_file' => $ebook_file_path,
            'category' => $request->category,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'summary' => $request->summary,
            'book_type' => $request->book_type,
            'stock' => $request->stock,
            'date_of_issue' => Carbon::parse($request->date_of_issue)->format('Y-m-d')
        ]);
        
        Session::flash('success', 'Berhasil menambahkan buku');
        return redirect('/books');

    }

    public function editBook(Book $book) {

        if (!Auth::user()->isAdmin) {
            return abort(404);
        }

        return view('editbook',[
            'book' => $book
        ]);

    }

    public function actionEditBook(Request $request) {

        if (!Auth::user()->isAdmin) {
            return abort(404);
        }

        $book = Book::find($request->id);

        $cover_path = "";
        if ($request->hasFile('cover')) {
            global $cover_path;

            $filename = 'public'.$book->cover;

            Storage::delete($filename);

            $file = $request->file('cover');
            $cover_name = Str::random(9);
            $cover_path = 'public/books/covers/';
            
            
            $file->storeAs($cover_path, $cover_name);

            $cover_path = '/books/covers/' . $cover_name;
 
        }

        $ebook_file_path = "";
        if ($request->hasFile('ebook_file')) {
            global $ebook_file_path;

            $filename = 'public'.$book->ebook_file;

            Storage::delete($filename);

            $file = $request->file('ebook_file');
            $ebook_file_name = Str::random(9);
            $ebook_file_path = 'public/ebook/file/';
            
            
            $file->storeAs($ebook_file_path, $ebook_file_name);

            $ebook_file_path = '/books/covers/' . $ebook_file_name;
        }
        
        if ($cover_path != "" && $ebook_file_path != "") {
            $book->update([
                'title' => $request->title,
                'cover' => $cover_path,
                'ebook_file' => $ebook_file_path,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'summary' => $request->summary,
                'book_type' => $request->book_type,
                'stock' => $request->stock,
                'date_of_issue' => Carbon::parse($request->date_of_issue)->format('Y-m-d')
            ]);
        } elseif ($cover_path != "") {
            $book->update([
                'title' => $request->title,
                'cover' => $cover_path,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'summary' => $request->summary,
                'book_type' => $request->book_type,
                'stock' => $request->stock,
                'date_of_issue' => Carbon::parse($request->date_of_issue)->format('Y-m-d')
            ]);
        } elseif ($ebook_file_path != "") {
            $book->update([
                'title' => $request->title,
                'ebook_file' => $ebook_file_path,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'summary' => $request->summary,
                'book_type' => $request->book_type,
                'stock' => $request->stock,
                'date_of_issue' => Carbon::parse($request->date_of_issue)->format('Y-m-d')
            ]);
        } else {
            $book->update([
                'title' => $request->title,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'summary' => $request->summary,
                'book_type' => $request->book_type,
                'stock' => $request->stock,
                'date_of_issue' => Carbon::parse($request->date_of_issue)->format('Y-m-d')
            ]);
        }

        Session::flash('success', 'Berhasil Edit Buku');
        return redirect('/books');

    }

    public function deleteBook(Book $book) {

        if (!Auth::user()->isAdmin) {
            return abort(404);
        }

        Storage::delete('public'.$book->cover);
        $book->delete();

        Session::flash('success', 'Berhasil Menghapus Buku');
        return redirect('/books');
        
    }

    public function borrow(Book $book) {
        $link = env('APP_URL') . "scan?type=borrow&book=$book->id&user=". Auth::id();
        
        return view('borrow', [
            'link' => $link
        ]);
    }

    public function returnBook(Borrow $borrow) {
        $link = env('APP_URL') . "scan?type=return&book=".$borrow->kode."&user=". Auth::id();
        
        return view('return', [
            'link' => $link
        ]);
    }

    public function readBook(Book $book){ 

        if (!Auth::user()->isMember || !Auth::user()->isAdmin && $book->book_type == "book") {
            return abort(404);
        }
        
        
        return view('read', [
            'file' => $book->ebook_file
        ]);
    }
}
