<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books.index', [
            'title' => 'Book',
            'books' => Book::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create', [
            'title' => 'Tambah Data',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_buku' => 'required | string',
            'judul' => 'required | string',
            'auth_id' => 'required | exists:authors,id',
            'penerbit' => 'required | string',
            'tahun_terbit' => 'required | digits:4| integer| min:1900| max:2900',
            'cat_id' => 'required | exists:categories,id',
        ]);

        Book::create($validatedData);

        return redirect('/books')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', [
            'title' => 'Edit Data',
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'kode_buku' => 'required | string',
            'judul' => 'required | string',
            'auth_id' => 'required | integer',
            'penerbit' => 'required | string',
            'tahun_terbit' => 'required | digits:4| integer| min:1900| max:2900',
            'cat_id' => 'required | integer',
        ]);

        Book::where('id', $book->id)
            ->update($validatedData);

        return redirect('/books')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        Book::destroy($book->id);

        return redirect('/books')->with('success', 'Data berhasil dihapus!');
    }
}
