<?php

namespace App\Http\Controllers;

use App\Models\Event;
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

}
