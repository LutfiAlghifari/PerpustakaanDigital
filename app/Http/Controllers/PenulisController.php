<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    public function index()
    {
        return Penulis::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'author_id' => 'required|string|max:50|unique:penulis',
            'nama' => 'required|string|max:50',
            'kebangsaan' => 'required|string|max:50',
            'tanggal_lahir' => 'required|string|max:10',
        ]);

        return Penulis::create($request->all());
    }

    public function show($id)
    {
        return Penulis::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $penulis = Penulis::findOrFail($id);
        $penulis->update($request->all());

        return $penulis;
    }

    public function destroy($id)
    {
        return Penulis::destroy($id);
    }
}
