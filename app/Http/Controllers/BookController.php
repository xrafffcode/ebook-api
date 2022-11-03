<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::with('author')->get();

        return ResponseFormatter::success(
            $books,
            'Data list books berhasil diambil'
        );
    }

    public function store(BookRequest $request)
    {

        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => $request->author_id,
            'publisher' => $request->publisher,
            'date_of_issue' => $request->date_of_issue,
        ]);

        return ResponseFormatter::success(
            $book,
            'Data buku berhasil ditambahkan'
        );
    }

    public function show($id)
    {
        $book = Book::with('author')->findOrFail($id);

        return ResponseFormatter::success(
            $book,
            'Data detail buku berhasil diambil'
        );
    }

    public function update(BookRequest $request, $id)
    {
        $book = Book::with('author')->findOrFail($id);

        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => $request->author_id,
            'publisher' => $request->publisher,
            'date_of_issue' => $request->date_of_issue,
        ]);

        return ResponseFormatter::success(
            $book,
            'Data buku berhasil diubah'
        );
    }


    public function destroy($id)
    {
        $book = Book::with('author')->findOrFail($id);

        $book->delete();

        return ResponseFormatter::success(
            $book,
            'Data buku berhasil dihapus'
        );
    }
}
