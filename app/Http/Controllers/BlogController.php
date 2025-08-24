<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    // Halaman list blog
    public function index()
    {
        $blogs = Blog::query()
            ->select('id', 'title', 'published_at', 'author', 'img', 'slug', 'content')
            ->orderByDesc('published_at')
            ->paginate(6);

        return view('guest.blog.blog', compact('blogs'));
    }

    // public function showDetail($slug)
    // {
    //     $blog = Blog::with(['categories:id,category_name'])
    //         ->where('slug', $slug)
    //         ->firstOrFail();

    //     return view('blog.detail', compact('blog'));
    // }
}
