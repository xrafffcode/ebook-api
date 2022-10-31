<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Helpers\ResponseFormatter;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::all();

        return ResponseFormatter::success(
            $authors,
            'Data list authors berhasil diambil'
        );
    }



    public function store(AuthorRequest $request)
    {

        $author = Author::create([
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'place_of_birth' => $request->place_of_birth,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return ResponseFormatter::success(
            $author,
            'Data author berhasil ditambahkan'
        );
    }


    public function show($id)
    {
        $author = Author::findOrFail($id);

        return ResponseFormatter::success(
            $author,
            'Data detail author berhasil diambil'
        );
    }



    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $author->update([
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'place_of_birth' => $request->place_of_birth,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return ResponseFormatter::success(
            $author,
            'Data author berhasil diubah'
        );
    }


    public function destroy($id)
    {
        $author = Author::findOrFail($id);

        $author->delete();

        return ResponseFormatter::success(
            $author,
            'Data author berhasil dihapus'
        );
    }
}
