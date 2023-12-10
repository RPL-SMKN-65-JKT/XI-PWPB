<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Classification;

class KoleksiController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::orderBy('title', 'asc');
        $dateNow = Carbon::now()->format('Y-m-d');

        if (request('sort') == 'newest') {
            $books = Book::orderBy('publication_year', 'desc');
        } else if (request('sort') == 'alfabet') {
            $books = Book::orderBy('title', 'asc');
        } else if (request('sort') == 'desc') {
            $books = Book::orderBy('title', 'desc');
        } else if (request('sort') == 'oldest') {
            $books = Book::orderBy('publication_year', 'asc');
        }

        return view('main.koleksi', [
            "books" => $books->filter(request(['search', 'classification', 'jenis']))->get(),
            "types" => Type::orderBy('name', 'asc')->get(),
            "classifications" => Classification::all(),
            'date_now' => $dateNow
        ]);
    }

    public function details(Book $book)
    {
        $dateNow = Carbon::now()->format('Y-m-d');
        return view('main.detailBuku', [
            "book" => $book,
            'date_now' => $dateNow
        ]);
    }
}
