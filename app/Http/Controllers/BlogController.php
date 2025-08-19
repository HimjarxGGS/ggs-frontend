<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    // Halaman list blog
    public function showBlog()
    {
        $blogs = Blog::with(['categories:id,category_name'])
            ->select('id', 'title', 'published_at', 'author', 'img', 'slug')
            ->orderByDesc('published_at')
            ->paginate(6);

        return view('blog.blog', compact('blogs'));
    }

    // Halaman detail blog (slug digunakan untuk SEO-friendly URL)
    public function showDetail($slug)
    {
        $blog = Blog::with(['categories:id,category_name'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('blog.detail', compact('blog'));
    }
}
