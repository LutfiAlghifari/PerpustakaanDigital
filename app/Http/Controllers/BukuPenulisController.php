<?php

namespace App\Http\Controllers;

use App\Models\BukuPenulis;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BukuPenulisController extends Controller
{
    public function index()
    {
        return BukuPenulis::with(['buku', 'penulis'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:buku,book_id',
            'author_id' => 'required|exists:penulis,author_id',
        ]);

        $exists = BukuPenulis::where('book_id', $validated['book_id'])
                             ->where('author_id', $validated['author_id'])
                             ->first();

        if ($exists) {
            return response()->json(['message' => 'Relasi sudah ada'], 409);
        }

        $validated['id'] = Str::uuid();
        $bukuPenulis = BukuPenulis::create($validated);

        return response()->json($bukuPenulis, 201);
    }

    public function show($id)
    {
        $bp = BukuPenulis::with(['buku', 'penulis'])->findOrFail($id);
        return response()->json($bp);
    }

    public function update(Request $request, $id)
    {
        $bukuPenulis = BukuPenulis::findOrFail($id);

        $validated = $request->validate([
            'book_id' => 'required|exists:buku,book_id',
            'author_id' => 'required|exists:penulis,author_id',
        ]);

        $bukuPenulis->update($validated);

        return response()->json($bukuPenulis);
    }

    public function destroy($id)
    {
        $bukuPenulis = BukuPenulis::findOrFail($id);
        $bukuPenulis->delete();

        return response()->json(['message' => 'Data dihapus']);
    }
}

