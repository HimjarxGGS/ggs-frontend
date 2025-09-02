<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {

        $upcoming = Event::where('status', 'active')
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        $finished = Event::where('status', 'finished')
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();
        
            return view('guest.events.index', compact('upcoming', 'finished'));
    }

    // public function upcoming(){
    //     $events = Event::where('status', 'upcoming')->get();

    //     return view()
    // }
    public function list(){
        $events = Event::orderBy('event_date', 'desc')
        ->paginate(9);

        return view('guest.event.list', compact('events'));
    }

    public function show($id){
        $event = Event::findOrFail($id);

        return view('guest.event.detail', compact('event'));
    }
}
