<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Auth; // <- jangan lupa import

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil event terbaru berdasarkan tanggal event
        $events = Event::orderBy('event_date', 'desc')->paginate(6);

        // Ambil user yang sedang login
        $users = Auth::user();

        // kirim events dan users ke view
        return view('member.dashboard.index', compact('events', 'users'));
    }
}
