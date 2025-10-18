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
        // Validasi create & update
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', 'regex:/\.com$/i'],
            'asal_instansi' => 'required|string|max:255',
            $request->validate([
                'date_of_birth' => 'required|date|before_or_equal:-15 years|after_or_equal:-100 years',
            ], [
                'date_of_birth.before_or_equal' => 'Umur minimal 15 tahun.',
                'date_of_birth.after_or_equal' => 'Umur maksimal 100 tahun.',
            ]),
            'telepon' => ['required', 'regex:/^[0-9]{10,12}$/'],
            'riwayat_penyakit' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            // dd($request->file('foto'))
        ], [
            'email.regex' => 'Email harus menggunakan domain .com',
            'required' => 'Field ini wajib diisi',
        ]);

        $dateOfBirth = $request->date_of_birth;
        $userId = Auth::id();

        // Check user if already has data
        $pendaftar = Pendaftar::where('user_id', $userId)->first();

        if ($request->hasFile('foto')) {
            $picturePath = $request->file('foto')->store('pendaftars', 'public');

            if ($pendaftar && $pendaftar->registrant_picture) {
                Storage::disk('public')->delete($pendaftar->registrant_picture);
            }
        } else {
            $picturePath = $pendaftar->registrant_picture ?? null;
        }

        $data = [
            'user_id' => $userId,
            'nama_lengkap' => $request->nama,
            'date_of_birth' => $dateOfBirth,
            'email' => $request->email,
            'asal_instansi' => $request->asal_instansi,
            'no_telepon' => $request->telepon,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'registrant_picture' => $picturePath,
        ];

        if ($pendaftar) {
            // Update existing record
            $pendaftar->update($data);
            $message = 'Data diri berhasil diperbarui!';
        } else {
            // make new record
            Pendaftar::create($data);
            $message = 'Data diri berhasil disimpan!';
        }

        return redirect()->route('member.datadiri.index')->with('success', $message);
    }
}
