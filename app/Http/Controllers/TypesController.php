<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Classification;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::orderBy('name', 'asc');

        if (request('sort') == 'klasifikasi') {
            $types = Type::orderBy('classification_id', 'asc');
        } else if (request('sort') == 'alfabet') {
            $types = Type::orderBy('name', 'asc');
        } else if (request('sort') == 'desc') {
            $types = Type::orderBy('name', 'desc');
        }

        return view('dashboard.types.index', [
            'title' => 'Jenis Buku',
            'types' => $types->filter(request(['search']))->get(),
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

        $type = Type::create($validated);

        return redirect('/dashboard/types')->with([
            'success' => 'Berhasil Menambah Jenis ',
            'name' => $type->name
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $oldName = $request->input('oldName');

        $validated = $request->validate([
            'id' => 'required|exists:types,id',
            'name' => 'required',
            'classification_id' => 'required|exists:classifications,id'
        ]);

        Type::where('id', $validated['id'])->update($validated);

        return redirect('/dashboard/types')->with([
            'success' => 'Berhasil Mengubah Jenis ',
            'name' => $oldName
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type = Type::findOrFail($type->id);
        $type->delete();
        return redirect('/dashboard/types')->with([
            'success' => 'Berhasil Menghapus Jenis ',
            'name' => $type->name
        ]);
    }
}
