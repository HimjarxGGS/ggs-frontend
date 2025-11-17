<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);

        // Kirim email (akan di-setup sesuai cPanel)
        Mail::send([], [], function ($message) use ($request) {
            $message->to('ggsmail@faridfarhan.my.id') // email tujuan
                    ->subject('New Contact Form Submission')
                    ->setBody(
                        "Name: {$request->name}\n" .
                        "Email: {$request->email}\n" .
                        "Message: {$request->message}"
                    );
        });

        return back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}
