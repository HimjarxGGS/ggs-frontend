<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns',
            'message' => 'required|string|min:10|max:1000'
        ]);

        $allowedDomains = [
            'gmail.com',
            'outlook.com',
            'hotmail.com',
            'yahoo.com',
            'icloud.com',
            'protonmail.com',
        ];

        $emailDomain = strtolower(substr(strrchr($request->email, "@"), 1));
        if (!in_array($emailDomain, $allowedDomains)) {
            return back()->withErrors([
                'email' => 'Only trusted email providers like Gmail, Outlook, Yahoo, iCloud, and Protonmail are allowed.'
            ])->withInput();
        }

        try {
            Mail::to(config('mail.to_admin'))
                ->send(new ContactFormMail([
                    'name' => $request->name,
                    'email' => $request->email,
                    'message' => $request->message
                ]));

            return back()->with('success', 'Thank you for your message! We will get back to you soon.');
        } catch (\Exception $e) {

            return back()->with('error', 'Sorry, there was an error sending your message. Please try again later.');
        }
    }
}
