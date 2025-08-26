<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Pendaftar; // jangan lupa import
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = Event::paginate(5);
        return view('member.history.index', compact('histories'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $user = Auth::user();

        
        $pendaftar = Pendaftar::where('user_id', $user->id)->first();

        return view('member.history.detail', [
            'history' => $event,
            'user' => $user,
            'pendaftar' => $pendaftar
        ]);
    }
}
