<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        // Simpan user tanpa password
        $user = User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => 'defaultpassword',
            'is_admin' => 0,
        ]);

        // Langsung login setelah register (opsional)
        // auth()->login($user);

        // return redirect()->route('home')->with('success', 'Pendaftaran berhasil!');
        return redirect()->route('user-registered');
    }

    public function userRegistered()
    {
        return view('registered');
    }
}
