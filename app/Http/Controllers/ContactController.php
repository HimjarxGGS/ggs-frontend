<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:10|max:1000'
        ]);

        Log::info('📧 Contact Form Submission:', [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'time' => now()->toString()
        ]);

        return back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}
