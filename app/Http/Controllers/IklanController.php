<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iklans = Iklan::all();

        return view('iklan.index', compact('iklans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Iklan  $iklan
     * @return \Illuminate\Http\Response
     */
    public function show(Iklan $iklan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Iklan  $iklan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iklan = Iklan::findOrFail($id);

        if (!$iklan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Iklan not found'
            ], 404);
        }

        return view('iklan.edit', compact('iklan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Iklan  $iklan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $iklan = Iklan::findOrFail($id);
    
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar_iklan' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
    
        $data = [
            'judul' => $request->judul,
            'aksi' => $request->aksi,
        ];
    
        // Cek apakah ada file gambar baru yang diunggah
        if ($request->hasFile('gambar_iklan')) {
            // Hapus gambar lama jika ada
            if ($iklan->gambar_iklan) {
                Storage::disk('public')->delete($iklan->gambar_iklan);
            }
    
            // Simpan gambar baru
            $image = $request->file('gambar_iklan');
            $imagePath = $image->store('iklan', 'public');
    
            // Tambahkan path gambar baru ke data yang akan diupdate
            $data['gambar_iklan'] = $imagePath;
        }
    
        // Update data iklan
        $iklan->update($data);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully!',
            'data' => $iklan
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Iklan  $iklan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Iklan $iklan)
    {
        //
    }
}
