<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $book = Buku::all();
        return view('admin.buku.view', compact('book'));
    }

    public function add()
    {
        return view('admin.buku.add');
    }

    public function edit($id)
    {
        $book = Buku::find($id);
        return view('admin.buku.edit', compact('book'));
    }

    public function store(Request $request)
    {
        $book = new Buku;
        $book->book_name = $request->book_name;
        $book->book_price = $request->book_price;
        $book->save();

        return redirect()->route('admin.book.index');
    }

    public function update($id, Request $request)
    {
        $book = Buku::find($id);
        $book->book_name = $request->book_name;
        $book->book_price = $request->book_price;
        $book->save();

        return redirect()->route('admin.book.index')->with('success', 'success update data!');
    }

    public function destroy($id)
    {
        $book = Buku::find($id);
        $book->delete();

        return redirect()->route('admin.book.index')->with('success', 'success delete data!');
    }
}
