<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Type;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Classification;
use App\Http\Resources\TypeResource;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('title', 'asc');

        if (request('sort') == 'newest') {
            $books = Book::orderBy('publication_year', 'desc');
        } else if (request('sort') == 'alfabet') {
            $books = Book::orderBy('title', 'asc');
        } else if (request('sort') == 'desc') {
            $books = Book::orderBy('title', 'desc');
        } else if (request('sort') == 'oldest') {
            $books = Book::orderBy('publication_year', 'asc');
        }

        return view('dashboard.books.index', [
            'title' => "Data Buku",
            'books' => $books->filter(request(['search']))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.books.create', [
            'title' => "Upload Buku",
            'classifications' => Classification::orderBy('id', 'asc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:books,slug',
            'classification_id' => 'required|exists:classifications,id',
            'type_id' => 'required|exists:types,id',
            'author' => 'required',
            'publisher' => 'required',
            'publication_year' => 'required|numeric',
            'isbn' => 'required|numeric',
            'status' => 'required',
            'image' => 'image|file|max:2048',
            'description' => 'required',
            'ebook' => 'required',
        ]);

        $request->validate([
            'categories' => 'array',
            'categories.*' => 'exists:categories,id'
        ]);

        $validated['title'] = ucwords($validated['title']);
        $validated['author'] = ucwords($validated['author']);
        $validated['publisher'] = ucwords($validated['publisher']);
        $validated['description'] = ucfirst($validated['description']);
        $validated['image'] = $request->file('image')->store('book-image');
        $validated['link_ebook'] = $request->get('link_ebook');

        $book = Book::create($validated);

        if ($request->has('categories')) {
            $categories = $request->input('categories');
            $book->categories()->attach($categories);
        }

        return redirect('/dashboard/books')->with([
            'success' => 'Berhasil Menambahkan Buku ',
            'title' => $validated['title']
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('dashboard.books.edit', [
            'title' => 'Edit Buku',
            'classifications' => Classification::orderBy('id', 'asc')->get(),
            'types' => Type::where('classification_id', $book->classification_id)->get(),
            'categories' => Category::where('classification_id', $book->classification_id)->get(),
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $oldTitle = $book->title;

        $rules = [
            'title' => 'required',
            'classification_id' => 'required|exists:classifications,id',
            'type_id' => 'required|exists:types,id',
            'author' => 'required',
            'publisher' => 'required',
            'publication_year' => 'required|numeric',
            'isbn' => 'required|numeric',
            'status' => 'required',
            'image' => 'image|file|max:2048',
            'description' => 'required',
            'ebook' => 'required',
        ];

        if ($request->input('slug') != $book->slug) {
            $rules['slug'] = 'required|unique:books,slug';
        }

        $validated = $request->validate($rules);

        $validated['title'] = ucwords($validated['title']);
        $validated['author'] = ucwords($validated['author']);
        $validated['publisher'] = ucwords($validated['publisher']);
        $validated['description'] = ucfirst($validated['description']);
        $validated['link_ebook'] = $request->get('link_ebook');

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('book-image');
        }

        $book->update($validated);

        if ($request->has('categories')) {
            $categories = $request->input('categories');
            $book->categories()->sync($categories);
        } else {
            $book->categories()->detach();
        }

        return redirect('/dashboard/books')->with([
            'success' => 'Berhasil Mengubah Buku ',
            'title' => $oldTitle
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->image) {
            Storage::delete($book->image);
        }

        $book = Book::findOrFail($book->id);
        $book->delete();
        return redirect('/dashboard/books')->with([
            'success' => 'Berhasil Menghapus Buku ',
            'title' => $book->title
        ]);
    }

    public function typeBooks(Request $request)
    {
        $classificationId = (int)$request->query('uid');
        $types = Type::where('classification_id', $classificationId)->get();

        return TypeResource::collection($types);
    }

    public function categoriesBooks(Request $request)
    {
        $classificationId = (int)$request->query('uid');
        $types = Category::where('classification_id', $classificationId)->get();

        return TypeResource::collection($types);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Book::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
