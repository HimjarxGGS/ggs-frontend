<?php

namespace App\Http\Controllers;

use App\Models\PendaftarEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberEventRegisterController extends Controller
{
   public function store(Request $request, $eventId)
{
    $request->validate([
        'bukti_share' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048',
        'bukti_payment' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048',
        'pembayaran_via' => 'required|string',
        'hadir' => 'required|in:ya,tidak',
        'tata_tertib' => 'required|in:ya,tidak',
    ]);

    $buktiSharePath = $request->file('bukti_share')->store('bukti_share');
    $buktiPaymentPath = $request->file('bukti_payment')->store('bukti_payment');

    $pendaftar = Auth::user()->pendaftar;

    if (!$pendaftar) {
        return redirect()->back()->with('error', 'Lengkapi data diri terlebih dahulu sebelum mendaftar event.');
    }

    if (PendaftarEvent::where('event_id', $eventId)
    ->where('pendaftar_id', $pendaftar->id)
    ->exists()) 
    {
        return back()->with('error', 'Anda sudah mendaftar event ini.');
    }


    PendaftarEvent::create([
        'event_id' => $eventId,
        'pendaftar_id' => $pendaftar->id,
        'status' => 'pending',
        'bukti_share' => $buktiSharePath,
        'bukti_payment' => $buktiPaymentPath,
        'opsi_payment' => $request->pembayaran_via,
        'kesediaan_hadir' => $request->hadir,
        'kesediaan_menaati_aturan' => $request->tata_tertib,
    ]);

    return redirect()->route('member.dashboard.successEvent')
                     ->with('success', 'Registrasi event berhasil!');
}

}