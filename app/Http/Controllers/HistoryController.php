<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        // Filter tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('event_date', $request->tanggal);
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Ambil data dengan pagination
        $histories = $query->paginate(5)->appends($request->query());

        return view('member.history.index', compact('histories'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $user = Auth::user();

        $pendaftar = Pendaftar::where('user_id', $user->id)->first();

        return view('member.history.detail', [
            'history'   => $event,
            'user'      => $user,
            'pendaftar' => $pendaftar
        ]);
    }
}
