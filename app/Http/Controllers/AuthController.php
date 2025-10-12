<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pendaftar; // ← Tambahkan ini
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

    public function register(Request $request)
    {
        $request->validate([
            'notelfon' => 'required|numeric|digits_between:10,13|unique:pendaftars,no_telepon',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'notelfon.required' => 'No. Telepon harus diisi.',
            'notelfon.numeric' => 'No. Telepon harus angka.',
            'notelfon.digits_between' => 'No. Telepon harus 10-13 digit.',
            'notelfon.unique' => 'No. Telepon sudah terdaftar.',
            'username.required' => 'Username harus diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        $user = User::create([
            'name' => $request->username, 
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'member',
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username harus diisi.',
            'password.required' => 'Password harus diisi.',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return back()->withErrors([
                'username' => 'Username salah.',
            ])->onlyInput('username');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Password salah.',
            ])->onlyInput('username');
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('member.dashboard.index');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing.index');
    }
}
