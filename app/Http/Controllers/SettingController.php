<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);

        if (!$setting) {
            return response()->json([
                'status' => 'error',
                'message' => 'Setting not found'
            ], 404);
        }

        return view('setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);
    
        $request->validate([
            'web_name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'image_logo_web' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'facebook' => 'required',
            'instagram' => 'required',
            'whatsapp' => 'required',
        ]);
    
        $data = [
            'web_name' => $request->web_name,
            'address' => $request->address,
            'description' => $request->description,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
        ];
    
        // Cek apakah ada file gambar baru yang diunggah
        if ($request->hasFile('image_logo_web')) {
            // Hapus gambar lama jika ada
            if ($setting->image_logo_web) {
                Storage::disk('public')->delete($setting->image_logo_web);
            }
    
            // Simpan gambar baru
            $image = $request->file('image_logo_web');
            $imagePath = $image->store('setting', 'public');
    
            // Tambahkan path gambar baru ke data yang akan diupdate
            $data['image_logo_web'] = $imagePath;
        }
    
        // Update data setting
        $setting->update($data);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully!',
            'data' => $setting
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
