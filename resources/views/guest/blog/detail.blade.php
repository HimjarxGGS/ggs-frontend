@extends('guest.layouts.app')

@section('title', 'Detail Blog - ' . $blog->title)

@section('content')
<div class="min-h-screen flex flex-col overflow-x-hidden">

    {{-- Blog Detail Section --}}
    <section class="max-w-5xl w-full mx-auto py-10 px-4 flex-1 overflow-x-hidden">

        {{-- Breadcrumb --}}
        <div class="mt-20 mb-5 text-sm text-gray-500 break-words">
            <a href="/" class="hover:underline text-palette-5 transition duration-300">Home</a> /
            <a href="{{ route('blog.index') }}" class="hover:underline text-palette-5 transition duration-300">Blog</a> /
            <span class="text-gray-800">{{ $blog->title }}</span>
        </div>

        {{-- Blog Image --}}
        <div class="mb-8 overflow-hidden rounded-lg">
            <img
                src="{{ $blog->img ? asset('storage/' . $blog->img) : asset('images/blog.png') }}"
                alt="{{ $blog->title }}"
                class="w-full h-48 md:h-80 object-cover shadow">
        </div>

        {{-- Blog Title & Info --}}
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl font-bold mb-2 text-palette-3 break-words">
                {{ $blog->title }}
            </h1>
            <p class="text-sm text-gray-500">
                {{ $blog->author }} | {{ \Carbon\Carbon::parse($blog->published_at)->translatedFormat('d F Y') }}
            </p>
        </div>

        {{-- Blog Content --}}
        <article
            class="blog-content prose prose-neutral max-w-full overflow-x-auto text-palette-2 leading-relaxed space-y-4 text-justify">

            {!! strip_tags(
                $blog->content,
                '<p><a><em><ul><ol><li><br><h1><h2><h3><img><blockquote><figure><figcaption><pre><code>'
            ) !!}
        </article>

        {{-- Related Post --}}
        <section class="mt-16 overflow-x-hidden">
            <h2 class="text-2xl md:text-3xl font-bold text-black mb-6 text-left">
                Related Post
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @forelse($otherBlogs as $i => $item)
                    <div class="{{ $i >= 1 ? 'hidden sm:block' : '' }} space-y-2">
                        <a href="{{ route('blog.detail', $item->slug ?? '#') }}" class="block">
                            <img 
                                src="{{ $item->img ? asset('storage/'.$item->img) : asset('images/blog.png') }}"
                                alt="Blog Thumbnail"
                                class="w-full h-32 md:h-40 object-cover rounded-lg"
                            >
                            <h3 class="text-sm font-semibold leading-tight text-palette-3 mt-2 break-words">
                                {{ Str::limit($item->title ?? 'Blog '.($i+1), 60) }}
                            </h3>
                            <p class="text-xs text-gray-500">
                                {{ optional($item)->published_at
                                    ? \Carbon\Carbon::parse($item->published_at)->format('d M Y')
                                    : now()->format('d M Y') }}
                                <br>
                                {{ $item->author ?? 'Unknown Author' }}
                            </p>
                        </a>
                    </div>
                @empty
                    <p class="col-span-4 text-center text-gray-500 py-10">
                        Belum ada blog lain untuk ditampilkan.
                    </p>
                @endforelse
            </div>
        </section>

        {{-- Blog Submission Section --}}
        <section class="max-w-5xl w-full mx-auto py-16 px-4 overflow-x-hidden">
            <div id="submitBlogForm"
                class="bg-palette-3 shadow-md rounded-3xl p-6 md:p-10 w-full mx-auto">

                <h2 class="md:text-4xl text-xl font-semibold mb-2 text-white md:text-left text-center">
                    Submit your Idea
                </h2>
                <p class="text-gray-400 text-sm md:text-left text-center mb-7">
                    Submit your own blog and inspire others with your story.
                </p>

                <form action="{{ route('blog.submit') }}" method="POST" class="space-y-4 w-full">
                    @csrf

                    <div>
                        <label class="block mb-2 text-sm font-medium text-white">Email</label>
                        <input type="email" name="email" required placeholder="Enter valid email"
                            class="w-full px-3 py-3 rounded-xl bg-white text-palette-2 focus:ring focus:ring-palette-4">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-white">Subject - Blog Title</label>
                        <input type="text" name="subject" required placeholder="Enter Subject"
                            class="w-full px-3 py-3 rounded-xl bg-white text-palette-2 focus:ring focus:ring-palette-4">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-white">Share your thoughts</label>
                        <textarea name="content" rows="7" required placeholder="Enter your blog content"
                            class="w-full px-3 py-3 rounded-xl bg-white text-palette-2 focus:ring focus:ring-palette-4"></textarea>
                    </div>

                    <button type="submit"
                        class="bg-palette-1 text-palette-2 w-full py-3 rounded-full font-medium hover:scale-[1.02] transition">
                        Share My Thoughts and Idea
                    </button>
                </form>
            </div>
        </section>

    </section>
</div>
@endsection
