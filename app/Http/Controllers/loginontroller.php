<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input agar tidak kosong
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.'
        ]);

        // Ambil data user berdasarkan email
        $user = DB::table('users')->where('email', $request->email)->first();

        if (! $user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.']);
        }

        // Bandingkan password (plain text)
        if ($user->password !== $request->password) {
            return back()->withErrors(['password' => 'Password salah.']);
        }

        // Login manual dengan ID user
        Auth::loginUsingId($user->id);

        // Redirect sesuai role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.dashboard');
        } else {
            return redirect()->route('user.dashboard'); // role "user" biasa
        }
    }
}
