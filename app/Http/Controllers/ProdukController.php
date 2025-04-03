<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::latest()->get();

        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();

        return view('produk.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'id_kategori' => 'required',
            'harga' => 'required|string|max:15',
            'qty' => 'required|string|max:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'status' => 'required',
            'deskripsi' => 'required',
        ]);
    
        // Upload Image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('produk', 'public');
        }

        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'id_kategori' => $request->id_kategori,
            'harga' => $request->harga,
            'qty' => $request->qty,
            'image' => $imagePath ?? null,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data created successfully!',
            'data' => $produk
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategoris = Kategori::all();

        if (!$produk) {
            return response()->json([
                'status' => 'error',
                'message' => 'Produk not found'
            ], 404);
        }

        return view('produk.edit', compact('produk', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
    
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'id_kategori' => 'required',
            'harga' => 'required|string|max:15',
            'qty' => 'required|string|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'status' => 'required',
            'deskripsi' => 'required',
        ]);
    
        $data = [
            'nama_produk' => $request->nama_produk,
            'id_kategori' => $request->id_kategori,
            'harga' => $request->harga,
            'qty' => $request->qty,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
        ];
    
        // Cek apakah ada file gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($produk->image) {
                Storage::disk('public')->delete($produk->image);
            }
    
            // Simpan gambar baru
            $image = $request->file('image');
            $imagePath = $image->store('produk', 'public');
    
            // Tambahkan path gambar baru ke data yang akan diupdate
            $data['image'] = $imagePath;
        }
    
        // Update data produk
        $produk->update($data);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully!',
            'data' => $produk
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        // Hapus gambar jika ada
        if ($produk->image) {
            Storage::disk('public')->delete($produk->image);
        }

        // Hapus data produk dari database
        $produk->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully!',
        ], 200);
    }
}
