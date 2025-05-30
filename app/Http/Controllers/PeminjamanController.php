<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        return Peminjaman::with(['pengguna', 'buku'])->get();
    }

    public function show($id)
    {
        return Peminjaman::with(['pengguna', 'buku'])->findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'loan_id' => 'required|string|max:50|unique:peminjaman',
            'user_id' => 'required|string|exists:pengguna,user_id',
            'book_id' => 'required|string|exists:buku,book_id',
            'tanggal_pinjam' => 'nullable|date',
            'tanggal_kembali' => 'nullable|date',
            'status' => 'in:aktif,dikembalikan,terlambat',
        ]);

        return Peminjaman::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $request->validate([
            'user_id' => 'sometimes|required|string|exists:pengguna,user_id',
            'book_id' => 'sometimes|required|string|exists:buku,book_id',
            'tanggal_pinjam' => 'nullable|date',
            'tanggal_kembali' => 'nullable|date',
            'status' => 'in:aktif,dikembalikan,terlambat',
        ]);

        $peminjaman->update($request->all());
        return $peminjaman;
    }

    public function destroy($id)
    {
        return Peminjaman::destroy($id);
    }
}
