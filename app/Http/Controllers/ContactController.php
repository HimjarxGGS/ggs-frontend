<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage; 

class ContactController extends Controller
{
    public function store(Request $request)
{
    try {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);


        return back()->with('success', 'Thank you for your message! We will get back to you soon.');
        
    } catch (\Exception $e) {
        return back()->with('error', 'Sorry, there was an error sending your message. Please try again.');
    }
}
}