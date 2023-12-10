<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Classification;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::orderBy('name', 'asc');

        if (request('sort') == 'klasifikasi') {
            $categories = Category::orderBy('classification_id', 'asc');
        } else if (request('sort') == 'alfabet') {
            $categories = Category::orderBy('name', 'asc');
        } else if (request('sort') == 'desc') {
            $categories = Category::orderBy('name', 'desc');
        }

        return view('dashboard.categories.index', [
            'title' => 'Genre Buku',
            'categories' => $categories->filter(request(['search']))->get(),
            'classifications' => Classification::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'classification_id' => 'required|numeric'
        ]);

        $validated['name'] = ucwords($validated['name']);

        $category = Category::create($validated);

        return redirect('/dashboard/categories')->with([
            'success' => 'Berhasil Menambah Genre ',
            'name' => $category->name
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $oldName = $request->input('oldName');

        $validated = $request->validate([
            'id' => 'required|exists:categories,id',
            'name' => 'required',
            'classification_id' => 'required|exists:classifications,id'
        ]);

        Category::where('id', $validated['id'])->update($validated);

        return redirect('/dashboard/categories')->with([
            'success' => 'Berhasil Mengubah Genre ',
            'name' => $oldName . ' -> ' . $validated['name']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category = Category::findOrFail($category->id);
        $category->delete();
        return redirect('/dashboard/categories')->with([
            'success' => 'Berhasil Menghapus Genre ',
            'title' => $category->name
        ]);
    }
}
