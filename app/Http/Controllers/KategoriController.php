<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::latest()->get();

        return view('kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'kategori' => 'required|string|max:255',
            'image_kategori' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
    
        // Upload Image
        if ($request->hasFile('image_kategori')) {
            $image = $request->file('image_kategori');
            $imagePath = $image->store('kategori', 'public');
        }

        $kategori = Kategori::create([
            'kategori' => $request->kategori,
            'image_kategori' => $imagePath ?? null,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data created successfully!',
            'data' => $kategori
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        if (!$kategori) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kategori not found'
            ], 404);
        }

        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
    
        $request->validate([
            'kategori' => 'required|string|max:255',
            'image_kategori' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
    
        $data = [
            'kategori' => $request->kategori,
        ];
    
        // Cek apakah ada file gambar baru yang diunggah
        if ($request->hasFile('image_kategori')) {
            // Hapus gambar lama jika ada
            if ($kategori->image_kategori) {
                Storage::disk('public')->delete($kategori->image_kategori);
            }
    
            // Simpan gambar baru
            $image = $request->file('image_kategori');
            $imagePath = $image->store('kategori', 'public');
    
            // Tambahkan path gambar baru ke data yang akan diupdate
            $data['image_kategori'] = $imagePath;
        }
    
        // Update data kategori
        $kategori->update($data);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully!',
            'data' => $kategori
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        // Hapus gambar jika ada
        if ($kategori->image_kategori) {
            Storage::disk('public')->delete($kategori->image_kategori);
        }

        // Hapus data kategori dari database
        $kategori->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully!',
        ], 200);
    }
}
