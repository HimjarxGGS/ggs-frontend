<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log; 

use App\Mail\BlogSubmission;

class BlogController extends Controller
{
    public function index()
    {
        $highlightedBlog = Blog::latest('published_at')->first();
        $blogs = Blog::query()
            ->select('id', 'title', 'published_at', 'author', 'img', 'slug', 'content')
            ->orderByDesc('published_at')
            ->paginate(6);

        return view('guest.blog.blog', compact('blogs', 'highlightedBlog'));
    }
    
    public function detailBlog(string $slug)
    {
        $blog = Blog::query()
            ->select('id', 'title', 'published_at', 'author', 'img', 'slug', 'content')
            ->where('slug', $slug)->firstOrFail();

        $otherBlogs = Blog::query()
            ->select('id', 'title', 'published_at', 'author', 'img', 'slug', 'content')
            ->where('id', '!=', $blog->id)
            ->orderByDesc('published_at')
            ->take(4)
            ->get();

        return view('guest.blog.detail', compact('blog', 'otherBlogs'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $highlightedBlog = Blog::latest('published_at')->first();
        $blogs = Blog::query()
            ->select('id', 'title', 'published_at', 'author', 'img', 'slug', 'content')
            ->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            })
            ->orderByDesc('published_at')
            ->paginate(6)
            ->withQueryString();

        return view('guest.blog.blog', compact('blogs', 'highlightedBlog'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email:rfc,dns',
            'subject' => 'required|min:5|max:255',
            'content' => 'required|min:20',
        ]);

        $allowedDomains = [
            'gmail.com', 'outlook.com', 'hotmail.com', 'yahoo.com', 
            'icloud.com', 'protonmail.com',
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
            // Log Error setelah import Log di atas
            Log::error("Blog submission failed: " . $e->getMessage()); 

            return back()->with('error', 'Sorry, there was an error submitting your blog. Please try again later.');
        }
    }
}