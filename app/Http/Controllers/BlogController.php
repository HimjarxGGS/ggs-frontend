<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Mail;
use App\Mail\BlogSubmission;

class BlogController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email:rfc,dns',
            'subject' => 'required|min:5|max:255',
            'content' => 'required|min:20',
        ]);

        $allowedDomains = [
            'gmail.com',
            'outlook.com',
            'hotmail.com',
            'yahoo.com',
            'icloud.com',
            'protonmail.com',
        ];

        $email = strtolower($validatedData['email']);
        $emailDomain = substr(strrchr($email, "@"), 1);

        if (!in_array($emailDomain, $allowedDomains)) {
            return back()->withErrors([
                'email' => 'Only trusted email providers like Gmail, Outlook, Yahoo, iCloud, and Protonmail are allowed.'
            ])->withInput();
        }

        try {
            $adminEmail = config('mail.to_admin');
            Mail::to($adminEmail)->send(new BlogSubmission($validatedData));
            return back()->with('success', 'Thank you! Your blog has been submitted successfully.');
        } catch (\Exception $e) {
            // \Log::error("Blog submission failed: " . $e->getMessage()); 

            return back()->with('error', 'Sorry, there was an error submitting your blog. Please try again later.');
        }
    }
}
