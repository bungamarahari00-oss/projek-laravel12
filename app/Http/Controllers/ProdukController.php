<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('welcome', compact('produks'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $namaFoto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('storage/produk'), $namaFoto);
            $data['foto'] = $namaFoto;
        }

        Produk::create($data);

        return redirect('/produk');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        if ($produk->foto && file_exists(public_path('storage/produk/' . $produk->foto))) {
            unlink(public_path('storage/produk/' . $produk->foto));
        }
        $produk->delete();

        return redirect('/produk');
    }
}
