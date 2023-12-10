<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
  public function index()
  {
    $categories = Category::all();
    return view('categories', ['categories' => $categories]);
  }

  public function add()
  {

    return view('category-add');
  }

  public function store(Request $request)
  {
    //gboleh buat data baru yang udh ada
    $validated = $request->validate([
      'name' => 'required|unique:categories|max:100',
    ]);

    $category = Category::create($request->all());
    return redirect('categories')->with('status', 'Category baru berhasil ditambahkan');
  }

  public function edit($slug)
  {
    $category = Category::where('slug', $slug)->first();
    return view('category-edit', ['category' => $category]);
  }

  public function update(Request $request, $slug)
  {
    $validated = $request->validate([
      'name' => 'required|unique:categories|max:100',
    ]);

    $category = Category::where('slug', $slug)->first();
    $category->slug = null;
    $category->update($request->all());
    return redirect('categories')->with('status', 'Category berhasil di edit');
  }

  public function delete($slug)
  {
    $category = Category::where('slug', $slug)->first();
    return view('category-delete', ['category' => $category]);
  }

  public function destroy($slug)
  {
    $category = Category::where('slug', $slug)->first();
    $category->delete();
    return redirect('categories')->with('status', 'Category berhasil di hapus');
  }

  public function deleted()
  {
    $deletedCategories = Category::onlyTrashed()->get();
    return view('category-deleted', ['deletedCategories' => $deletedCategories]);
  }

  public function restore($slug)
  {
    $category = Category::withTrashed()->where('slug', $slug)->first();
    $category->restore();
    return redirect('categories')->with('status', 'Category berhasil di restore');
  }
}
