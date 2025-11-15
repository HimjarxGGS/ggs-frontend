<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftarEvent;
use App\Models\Event;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Dapatkan pendaftar data user ini
        $pendaftar = Pendaftar::where('user_id', $user->id)->first();

        if (!$pendaftar) {
    // Buat paginator kosong
    $histories = PendaftarEvent::where('id', null)->paginate(5);
} else {
    $query = PendaftarEvent::with(['event', 'pendaftar'])
        ->where('pendaftar_id', $pendaftar->id);

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('tanggal')) {
        $query->whereHas('event', function ($q) use ($request) {
            $q->whereDate('event_date', $request->tanggal);
        });
    }

    $histories = $query->orderBy('created_at', 'desc')
        ->paginate(5)
        ->appends($request->query());
}


        return view('member.history.index', compact('histories'));
    }

    public function show($id)
    {
        $user = Auth::user();

        // Dapatkan pendaftar data user ini
        $pendaftar = Pendaftar::where('user_id', $user->id)->first();

        if (!$pendaftar) {
            abort(404, 'Data pendaftar tidak ditemukan');
        }

        // Cari pendaftaran event yang dimiliki oleh user ini
        $pendaftaranEvent = PendaftarEvent::with(['event', 'pendaftar'])
            ->where('id', $id)
            ->where('pendaftar_id', $pendaftar->id)
            ->firstOrFail();

        return view('member.history.detail', [
            'pendaftaranEvent' => $pendaftaranEvent,
            'event' => $pendaftaranEvent->event,
            'pendaftar' => $pendaftaranEvent->pendaftar
        ]);
    }
}
