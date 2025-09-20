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

    public function upcoming(){
        $events = Event::where('status', 'active')
        -> orderBy('event_date', 'asc')
        -> paginate(6);

        return view('guest.events.list', 
        ['title' => 'Upcoming Event', 
        'subtitles' => 'Daftar event yang akan datang',
        'events' => $events]);

    }

    public function finished(){
        $events = Event::where('status', 'finished')
        -> orderBy('event_date', 'desc')
        -> paginate(6);

        return view('guest.events.list', 
        ['title' => 'Succesfull Event', 
        'subtitles' => 'Daftar event yang sudah selesai', 
        'events' => $events]);
        
    }

    public function list(){
        $events = Event::orderBy('event_date', 'desc')
        ->paginate(9);

        return view('guest.event.list', compact('events'));
    }

    public function show( $id){
        $event = Event::findOrFail($id);

        // Ambil 3 event lain
        $moreEvents = Event::where('id', '!=', $event->id)
                        ->where('status', 'active')
                       ->latest()
                       ->take(3)
                       ->get();

        return view('guest.events.detail', compact('event', 'moreEvents'));
    }
}
