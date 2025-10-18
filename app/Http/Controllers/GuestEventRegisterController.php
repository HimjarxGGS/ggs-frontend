<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\PendaftarEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestEventRegisterController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'user_id' => 'nullable|integer', // jika terkait user
            'nama_lengkap' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'required|email',
            'asal_instansi' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:20',
            'riwayat_penyakit' => 'nullable|string',
            'registrant_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'event_id' => 'required|integer',
            'status' => 'nullable|string',
            'bukti_payment' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'opsi_payment' => 'nullable|string',
            'bukti_share' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kesediaan_hadir' => 'required|boolean',
            'kesediaan_menaati_aturan' => 'required|boolean',
        ]);

        // Upload registrant_picture
        if ($request->hasFile('registrant_picture')) {
            $validated['registrant_picture'] = $request->file('registrant_picture')
                ->store('uploads/registrant_picture', 'public');
        }

        // Simpan ke tabel pendaftars
       $pendaftar = Pendaftar::create([
    'user_id' => $validated['user_id'] ?? null,
    'nama_lengkap' => $validated['nama_lengkap'],
    'date_of_birth' => $validated['date_of_birth'],
    'email' => $validated['email'],
    'asal_instansi' => $validated['asal_instansi'] ?? null,
    'no_telepon' => $validated['no_telepon'] ?? null,
    'riwayat_penyakit' => $validated['riwayat_penyakit'] ?? null,
    'registrant_picture' => $validated['registrant_picture'] ?? null,
]);


        // Upload bukti_payment & bukti_share
        $buktiPayment = $request->hasFile('bukti_payment')
            ? $request->file('bukti_payment')->store('uploads/bukti_payment', 'public')
            : null;

        $buktiShare = $request->hasFile('bukti_share')
            ? $request->file('bukti_share')->store('uploads/bukti_share', 'public')
            : null;

        // Simpan ke tabel pendaftar_events
        PendaftarEvent::create([
            'approved_by' => Auth::id(), // atau null jika belum diapprove
            'event_id' => $validated['event_id'],
            'pendaftar_id' => $pendaftar->id,
            'status' => $validated['status'] ?? 'pending',
            'bukti_payment' => $buktiPayment,
            'opsi_payment' => $validated['opsi_payment'] ?? null,
            'bukti_share' => $buktiShare,
            'kesediaan_hadir' => $validated['kesediaan_hadir'],
            'kesediaan_menaati_aturan' => $validated['kesediaan_menaati_aturan'],
        ]);

        return back()->with('success', 'Registrasi berhasil!');
    }
}
