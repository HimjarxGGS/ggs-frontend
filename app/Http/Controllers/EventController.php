<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index()
    {
        $upcoming = Event::where('status', 'active')
            ->where('event_date', '>=', Carbon::today())
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        $finished = Event::where('status', 'finished')
            ->orderBy('event_date', 'desc')
            ->take(3)
            ->get();

        return view('guest.events.index', compact('upcoming', 'finished'));
    }

    public function upcoming()
    {
        $events = Event::where('status', 'active')
            ->where('event_date', '>=', Carbon::today())
            ->orderBy('event_date', 'asc')
            ->paginate(6);

        return view(
            'guest.events.list',
            [
                'title' => 'Upcoming Event',
                'subtitles' => 'Daftar event yang akan datang',
                'events' => $events
            ]
        );
    }

    public function finished()
    {
        $events = Event::where('status', 'finished')
            ->orderBy('event_date', 'desc')
            ->paginate(6);

        return view(
            'guest.events.list',
            [
                'title' => 'Successful Event',
                'subtitles' => 'Daftar event yang sudah selesai',
                'events' => $events
            ]
        );
    }

    public function list()
    {
        $events = Event::orderBy('event_date', 'desc')
            ->paginate(9);

        return view('guest.events.list', compact('events'));
    }

    public function show($id)
    {
        $event = Event::with('dokumentasi')->findOrFail($id);
        
        $moreEvents = Event::where('id', '!=', $event->id)
            ->where('status', 'active')
            ->where('event_date', '>=', Carbon::today())
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        return view('guest.events.detail', compact('event', 'moreEvents'));
    }

    // Method untuk menampilkan form registrasi guest
    public function showRegistration($id)
    {
        $event = Event::findOrFail($id);

        // Validasi event
        if ($event->status !== 'active' || $event->event_date < Carbon::today()) {
            abort(404, 'Event tidak tersedia untuk registrasi');
        }

        return view('guest.events.register', compact('event'));
    }

    public function checkCertificate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'event_id' => 'required|integer',
        ]);

        $event = Event::find($request->event_id);
        if (!$event || !$event->sertif_url) {
            return response()->json([
                'valid' => false,
                'message' =>  "Sertifikat belum tersedia"
            ], 404);
        }

        // Check if email exists in related pendaftars table
        $emailExists = DB::table('pendaftar_events')
            ->join('pendaftars', 'pendaftars.id', '=', 'pendaftar_events.pendaftar_id')
            ->where('pendaftar_events.event_id', $event->id)
            ->where('pendaftars.email', $request->email)
            ->exists();

        if (!$emailExists) {
            return response()->json([
                'valid' => false,
                'message' => 'Email tidak ditemukan untuk event ini.'
            ], 404);
        }

        // Email found, return certificate link
        return response()->json([
            'valid' => true,
            'certificate_url' => $event->sertif_url
        ]);
    }


    // Method untuk memproses registrasi guest
    public function processRegistration(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'email' => 'required|email',
            'nama' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'usia' => 'required|integer|min:1',
            'telepon' => 'required|string|max:15',
            'penyakit' => 'nullable|string|max:255',
            'poster' => 'required|file|image|max:2048',
            'pembayaran' => 'required|file|image|max:2048',
            'foto' => 'required|file|image|max:2048',
            'hadir' => 'required|in:ya,tidak',
            'tata_tertib' => 'required|in:ya,tidak',
            'pembayaran_via' => 'required|in:bsi,ovo,gopay',
        ]);

        // TODO: Proses penyimpanan data registrasi
        // Simpan file, simpan data ke database, dll.

        return redirect()->route('event.registration.success')
            ->with('success', 'Registrasi event ' . $event->name . ' berhasil!');
    }
}
