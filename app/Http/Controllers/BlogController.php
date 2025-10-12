<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Mail;;

use App\Mail\BlogSubmission;

class BlogController extends Controller
{
    // Halaman list blog
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

        return view('guest.blog.detail', compact('blog'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

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

        return view('guest.blog.blog', compact('blogs'));
    }
    // public function showDetail($slug)
    // {
    //     $blog = Blog::with(['categories:id,category_name'])
    //         ->where('slug', $slug)
    //         ->firstOrFail();

    //     return view('blog.detail', compact('blog'));
    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email'   => 'required|email',
            'subject' => 'required|min:5|max:255',
            'content' => 'required|min:20',
        ]);
        $adminEmail = env('MAIL_TO_ADMIN');
        Mail::to($adminEmail)->send(new BlogSubmission($validatedData));
        // dd($validatedData);
        return back()->with('success', 'Thank you! Your blog has been submitted successfully.');
    }
}