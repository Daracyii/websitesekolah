<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function formLogin()
    {
        // Kalau sudah login, jangan tampilkan login lagi
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $ingatSaya = $request->boolean('ingat');

        if (Auth::attempt($credentials, $ingatSaya)) {
            $request->session()->regenerate();

            return redirect()
                ->intended(route('admin.dashboard'))
                ->with('sukses', 'Selamat datang, ' . Auth::user()->name . '!');
        }

        return back()
            ->withErrors(['login' => 'Username atau password salah.'])
            ->onlyInput('username');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('admin.login.form')
            ->with('sukses', 'Berhasil logout. Sampai jumpa!');
    }
}