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

    public function store(Request $request)
    {
        $request->validate([
            'nama'              => 'required|string|max:255',
            'email'             => 'required|email|max:255',
            'asal_instansi'     => 'required|string|max:255',
            'usia'              => 'required|integer|min:1',
            'telepon'           => 'required|string|max:20',
            'riwayat_penyakit'  => 'nullable|string',
            'foto'              => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

      
        $dateOfBirth = now()->subYears($request->usia)->startOfYear()->toDateString();

     
        $picturePath = null;
        if ($request->hasFile('foto')) {
            $picturePath = $request->file('foto')->store('pendaftars', 'public');
        }

        Pendaftar::create([
            'user_id'           => Auth::id(),
            'nama_lengkap'      => $request->nama,
            'date_of_birth'     => $dateOfBirth,
            'email'             => $request->email,
            'asal_instansi'     => $request->asal_instansi,
            'no_telepon'        => $request->telepon,
            'riwayat_penyakit'  => $request->riwayat_penyakit,
            'registrant_picture'=> $picturePath,
        ]);

        return redirect()->route('member.datadiri.index')->with('success', 'Data diri berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        $request->validate([
            'nama'              => 'required|string|max:255',
            'email'             => 'required|email|max:255',
            'asal_instansi'     => 'required|string|max:255',
            'usia'              => 'required|integer|min:1',
            'telepon'           => 'required|string|max:20',
            'riwayat_penyakit'  => 'nullable|string',
            'foto'              => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        
        $dateOfBirth = now()->subYears($request->usia)->startOfYear()->toDateString();

       
        if ($request->hasFile('foto')) {
            if ($pendaftar->registrant_picture && Storage::disk('public')->exists($pendaftar->registrant_picture)) {
                Storage::disk('public')->delete($pendaftar->registrant_picture);
            }
            $pendaftar->registrant_picture = $request->file('foto')->store('pendaftars', 'public');
        }

        $pendaftar->update([
            'nama_lengkap'      => $request->nama,
            'date_of_birth'     => $dateOfBirth,
            'email'             => $request->email,
            'asal_instansi'     => $request->asal_instansi,
            'no_telepon'        => $request->telepon,
            'riwayat_penyakit'  => $request->riwayat_penyakit,
            'registrant_picture'=> $pendaftar->registrant_picture,
        ]);

        return redirect()->route('member.datadiri.index')->with('success', 'Data diri berhasil diperbarui!');
    }
}
