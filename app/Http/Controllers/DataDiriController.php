<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DataDiriController extends Controller
{

    public function index()
    {
        $pendaftar = Pendaftar::where('user_id', Auth::id())->first();
        return view('member.datadiri.index', compact('pendaftar'));
    }


    public function storeOrUpdate(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'asal_instansi' => 'required|string|max:255',

            'date_of_birth' => 'required|date|before_or_equal:-10 years|after_or_equal:-100 years',
            'telepon' => ['required', 'regex:/^[0-9]{10,12}$/'],

            'riwayat_penyakit' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'date_of_birth.before_or_equal' => 'Umur minimal 10 tahun.',
            'date_of_birth.after_or_equal' => 'Umur maksimal 100 tahun.',
            'required' => 'Field ini wajib diisi.',
        ]);

        $user = Auth::user();
        $pendaftar = Pendaftar::where('user_id', $user->id)->first();

        // Handle foto
        if ($request->hasFile('foto')) {
            $picturePath = $request->file('foto')->store('pendaftars', 'public');

            // Hapus foto lama
            if ($pendaftar && $pendaftar->registrant_picture) {
                Storage::disk('public')->delete($pendaftar->registrant_picture);
            }
        } else {
            $picturePath = $pendaftar->registrant_picture ?? null;
        }

        // Data yang disimpan
        $data = [
            'user_id' => $user->id,
            'nama_lengkap' => $request->nama,
            'date_of_birth' => $request->date_of_birth,
            'asal_instansi' => $request->asal_instansi,
            'no_telepon' => $request->telepon,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'registrant_picture' => $picturePath,

            // Email otomatis ambil dari tabel users
            'email' => $user->email,
        ];

        // Simpan / update
        if ($pendaftar) {
            $pendaftar->update($data);
            $message = 'Data diri berhasil diperbarui!';
        } else {
            Pendaftar::create($data);
            $message = 'Data diri berhasil disimpan!';
        }

        return redirect()->route('member.datadiri.index')->with('success', $message);
    }
}
