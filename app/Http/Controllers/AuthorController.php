<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('authors.index', [
            'title' => 'Author',
            'authors' => Author::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create', [
            'title' => 'Tambah Data',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required | string',
            'lokasi' => 'required | string'
        ]);

        Author::create($validatedData);

        return redirect('/authors')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit', [
            'title' => 'Edit Data',
            'author' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $validatedData = $request->validate([
            'nama' => 'required | string',
            'lokasi' => 'required | string'
        ]);

        Author::where('id', $author->id)
            ->update($validatedData);

        return redirect('/authors')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        Author::destroy($author->id);

        return redirect('/authors')->with('success', 'Data berhasil dihapus!');
    }
}
