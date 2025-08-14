<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    // Cari user berdasarkan username
    $user = User::where('username', $request->username)->first();

    // Jika username tidak ditemukan
    if (!$user) {
        return back()->withErrors([
            'username' => 'Username salah.',
        ])->onlyInput('username');
    }

    // Jika password salah
    if (!Hash::check($request->password, $user->password)) {
        return back()->withErrors([
            'password' => 'Password salah.',
        ])->onlyInput('username'); // biar username tetap terisi
    }

    // Kalau username & password benar → login
    Auth::login($user);
    $request->session()->regenerate();

    return redirect()->route('member.pages.dashboard');
}
    public function logout(Request $request)
{
    
    auth()->logout();

    // Invalidasi session
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect ke home
    return redirect()->route('landing.index');
}

}
