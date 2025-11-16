<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Auth; // <- jangan lupa import

class DashboardController extends Controller
{
    public function index()
    {
        $query = Event::query();

        // Search
        if (request('search')) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . request('search') . '%')
                    ->orWhere('description', 'like', '%' . request('search') . '%');
            });
        }

        // Sorting
        if (request('sort') == 'oldest') {
            $query->orderBy('event_date', 'asc');
        } else {
            $query->orderBy('event_date', 'desc');
        }

        $events = $query->paginate(6)->appends(request()->query());
        $users = Auth::user();

        return view('member.dashboard.index', compact('events', 'users'));
    }

    public function showMember($id)
    {
        $event = Event::findOrFail($id);

        // Ambil 3 event lain
        $moreEvents = Event::where('id', '!=', $event->id)
            ->where('status', 'active')
            ->latest()
            ->take(3)
            ->get();

        // kalau mau pakai view khusus member:
        return view('member.dashboard.detail', compact('event', 'moreEvents'));
    }

    public function register($id)
    {

        $user = Auth::user();


        if ($user) {
            $pendaftar = Pendaftar::where('user_id', '=', $user->id)->first();
            
            if (empty($pendaftar->nama_lengkap) || empty($pendaftar->date_of_birth) || empty($pendaftar->email) || empty($pendaftar->asal_instansi) || empty($pendaftar->no_telepon)) {
                return redirect('/data-diri')
                    ->with('error', 'Lengkapi data diri terlebih dahulu sebelum registrasi event.');
            }
        }


        $event = Event::findOrFail($id);
        return view('member.dashboard.register', compact('event'));
    }
}
