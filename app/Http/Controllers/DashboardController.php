<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        
        $events = Event::latest()->paginate(6);

      
        return view('member.dashboard.index', compact('events'));
    }
}
