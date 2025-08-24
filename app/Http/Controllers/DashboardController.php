<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data event, bisa pakai paginate biar sesuai layout
        $events = Event::latest()->paginate(6);

        // Kirim ke view
        return view('member.dashboard.index', compact('events'));
    }
}
