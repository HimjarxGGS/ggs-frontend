<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
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

        return view('member.history.detail', [
            'history' => $event,
            'user' => $user
        ]);
    }
}