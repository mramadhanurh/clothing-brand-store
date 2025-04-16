<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
        ]);

        // Cari semua user dengan password yang cocok
        $users = User::where('password', $request->password)->get();

        if ($users->count() == 1) {
            $user = $users->first();
            auth()->login($user);

            if ($user->is_admin == 1) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('home');
            }
        } elseif ($users->count() > 1) {
            return redirect()->route('user-registered');
        } else {
            return redirect()->route('login')
                ->with('error', 'Password salah atau tidak ditemukan.');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout.');
    }
}
