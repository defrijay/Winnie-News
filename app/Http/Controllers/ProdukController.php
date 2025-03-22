<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'harga' => 'required|numeric',
    ]);

    $produk = Produk::create($validatedData);

    return response()->json($produk, 201);
}

}
