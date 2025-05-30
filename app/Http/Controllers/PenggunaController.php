<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        return Pengguna::all();
    }

    public function show($id)
    {
        return Pengguna::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|string|max:50|unique:pengguna',
            'nama' => 'required|string|max:50',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'required|string|max:50',
            'tanggal_bergabung' => 'required|date',
        ]);

        $requestData = $request->all();
        $requestData['password'] = Hash::make($request->password); // Enkripsi password

        return Pengguna::create($requestData);
    }

    public function update(Request $request, $id)
    {
        $pengguna = Pengguna::findOrFail($id);

        $request->validate([
            'nama' => 'sometimes|required|string|max:50',
            'email' => 'sometimes|required|email|unique:pengguna,email,' . $id . ',user_id',
            'password' => 'sometimes|nullable|string|max:50',
            'tanggal_bergabung' => 'sometimes|required|date',
        ]);

        $data = $request->all();
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $pengguna->update($data);
        return $pengguna;
    }

    public function destroy($id)
    {
        return Pengguna::destroy($id);
    }
}
