<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookshelfController extends Controller
{
    // public function bookshelf()
    // {
    //     $categories = Category::all();
    //     $bookshelf = Book::all();
    //     return view('bookshelf/bookshelf', [
    //         'bookshelf'  => $bookshelf,
    //         'categories' => $categories
    //     ]);

    // }
    public function bookshelf(Request $request)
    {
        $categories = Category::all();

        // Jika ada yang dikirim dari form berupa category atau title dari form maka kita melakukan
        if ($request->category || $request->title) {
            $bookshelf = Book::when($request->category, function ($query) use ($request) {
                $query->whereHas('categories', function ($c) use ($request) {
                    $c->where('categories.id', $request->category);
                });
            })
                ->when($request->title, function ($query) use ($request) {
                    $query->where('title', 'like', '%' . $request->title . '%');
                })
                ->get();
        } else {
            $bookshelf = Book::all();
        }

        return view('bookshelf/bookshelf', [
            'bookshelf'  => $bookshelf,
            'categories' => $categories
        ]);
    }


    public function popular()
    {
        $popular = Book::all();
        return view('bookshelf/popular', ['popular' => $popular]);
    }

    public function discover(Request $request)
    {
        $categories = Category::all();

        // Jika ada yang dikirim dari form berupa category atau title dari form maka kita melakukan
        if ($request->category || $request->title) {
            $bookshelf = Book::when($request->category, function ($query) use ($request) {
                $query->whereHas('categories', function ($c) use ($request) {
                    $c->where('categories.id', $request->category);
                });
            })
                ->when($request->title, function ($query) use ($request) {
                    $query->where('title', 'like', '%' . $request->title . '%');
                })
                ->get();
        } else {
            $bookshelf = Book::all();
        }

        return view('bookshelf/discover', [
            'bookshelf'  => $bookshelf,
            'categories' => $categories
        ]);
    }

    public function bookdetail($slug)
    {
        $book = Book::where('slug', $slug)->first();
        return view('bookshelf/bookdetail', ['book' => $book]);
    }
}
