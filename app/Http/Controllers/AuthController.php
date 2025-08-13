<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username harus diisi.',
            'password.required' => 'Password harus diisi.',
        ]);

        // Cek login
        if (Auth::attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('member.pages.dashboard');
        }

        // Jika gagal login
        return back()->withErrors([
            'username' => 'Username salah.',
            'password' => 'password salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
{
    // Hapus sesi user
    auth()->logout();

    // Invalidasi session
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect ke home
    return redirect()->route('landing.index');
}

}
