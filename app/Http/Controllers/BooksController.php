<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Classification;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('books', ['books' => $books]);
    }

    public function add()
    {
        $categories = Category::all();
        $classification = Classification::all();
        $type = Type::all();
        return view('book-add', [
            'categories' => $categories,
            'classification' => $classification,
            'type' => $type
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255',
            'classification_id' => 'required|exists:classification,id',
            'type_id' => 'required|exists:types,id',
            'tanggal_terbit' => 'required',
            'penulis' => 'required',
            'cover' => 'image|file|max:2048',
            'bahasa' => 'required',
            'penerbit' => 'required',
            'deskripsi' => 'required',
            'halaman' => 'required|numeric',
            'pdf' => 'mimes:pdf'


        ]);

        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
        }
        $ebook = '';
        if ($request->file('pdf')) {
            $extension = $request->file('pdf')->getClientOriginalExtension();
            $ebook = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('pdf')->storeAs('ebook', $ebook);
        }
        $validated['cover'] = $newName;
        $validated['pdf'] = $ebook;
        $book = Book::create($validated);
        $book->categories()->sync($request->categories);
        return redirect('books')->with('status', 'Buku Berhasil Ditambahkan');
    }

    public function edit($slug)
    {
        $books = Book::where('slug', $slug)->first();
        $categories = Category::all();
        $classification = Classification::all();
        $type = Type::all();
        return view('book-edit', [
            'books' => $books,
            'categories' => $categories,
            'classification' => $classification,
            'type' => $type
        ]);
    }

    public function update(Request $request, $slug)
    {
        $books = Book::where('slug', $slug)->first();

        $validated = $request->validate([
            'book_code' => 'required|unique:books,book_code,' . $books->id . ',id|max:255',
            'title' => 'required|max:255',
            'classification_id' => 'required|exists:classification,id',
            'type_id' => 'required|exists:types,id',
            'tanggal_terbit' => 'required',
            'penulis' => 'required',
            'cover' => 'image|file|max:2048',
            'bahasa' => 'required',
            'penerbit' => 'required',
            'deskripsi' => 'required',
            'halaman' => 'required|numeric',
            'pdf' => 'mimes:pdf'



        ]);

        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
            $validated['cover'] = $newName;
        }

        if ($request->file('pdf')) {
            $extension = $request->file('pdf')->getClientOriginalExtension();
            $ebook = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('pdf')->storeAs('ebook', $ebook);
            $validated['pdf'] = $ebook;
        }


        $books->slug = null;
        $books->update($validated);
        if ($request->categories) {
            $books->categories()->sync($request->categories);
        }
        return redirect('books')->with('status', 'Buku berhasil di edit');
    }

    public function delete($slug)
    {
        $book = Book::where('slug', $slug)->first();
        return view('book-delete', ['book' => $book]);
    }

    public function destroy($slug)
    {
        $book =  Book::where('slug', $slug)->first();

        $bookGambar = $book->cover;
        $ebook = $book->pdf;

        if ($book) {
            DB::table('book_category')->where('book_id', $book->id)->delete();
            if ($bookGambar && $ebook) {
                Storage::delete('ebook/' . $ebook);
                Storage::delete('cover/' . $bookGambar);
            }
            $book->delete();

            return response()->json([
                'status' => true,
                'message' => 'BERHASILL LAA'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'INVALID DATA BUKU'
            ]);
        }



        // $book->delete();
        // return redirect('books')->with('status', 'Buku berhasil di hapus');
    }
}
