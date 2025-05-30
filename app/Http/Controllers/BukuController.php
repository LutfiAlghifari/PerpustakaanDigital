<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        return Buku::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|string|max:50|unique:bukus,book_id',
            'judul' => 'required|string|max:100',
            'isbn' => 'required|string|max:20|unique:bukus,isbn',
            'penerbit' => 'required|string|max:50',
            'tahun_terbit' => 'required|string|size:4',
            'stok' => 'required|integer',
        ]);

        $buku = Buku::create($validated);
        return response()->json($buku, 201);
    }

    public function show($id)
    {
        return Buku::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'sometimes|required|string|max:100',
            'isbn' => 'sometimes|required|string|max:20|unique:bukus,isbn,' . $id . ',book_id',
            'penerbit' => 'sometimes|required|string|max:50',
            'tahun_terbit' => 'sometimes|required|string|size:4',
            'stok' => 'sometimes|required|integer',
        ]);

        $buku->update($validated);
        return response()->json($buku);
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return response()->json(null, 204);
    }
}

