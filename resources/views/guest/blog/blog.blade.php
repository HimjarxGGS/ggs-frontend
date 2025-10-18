@extends('guest.layouts.app')

@section('title', 'Blog - Green Generation Surabaya')

@section('content')
    <div class="min-h-screen flex flex-col">

        {{-- Blog Section --}}
        <section class="max-w-5xl mx-auto py-16 px-5 flex-1">
            {{-- Header: Blog Title + Search --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 mt-20 gap-4">
                <h1 class="text-3xl font-bold text-gray-800">Blog</h1>

                <div class="relative w-full md:w-80">
                    <form method="GET" action="{{ route('blog.search') }}">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                            <!-- Search Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" class="w-7 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 105.5 5.5a7.5 7.5 0 0011.15 11.15z" />
                            </svg>
                        </span>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari blog"
                            class="w-full border border-gray-300 rounded-full pl-12 pr-4 py-2 
                   focus:outline-none focus:ring focus:ring-palette-4 text-sm transition duration-200">
                    </form>
                </div>
            </div>

            <!-- BLOG MAIN HEADER -->
            @if ($highlightedBlog)
                <section class="max-w mb-4 mt-4">
                    <a href="{{ route('blog.detail', $highlightedBlog->slug) }}"
                        class="group block relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition duration-500">
                        <img src="{{ $highlightedBlog->img ? asset('storage/' . $highlightedBlog->img) : asset('images/blog.png') }}"
                            alt="Featured Blog Image"
                            class="w-full h-80 object-cover brightness-90 group-hover:brightness-75 transition duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

                        <div class="absolute bottom-0 left-0 p-8 text-white">
                            <h2 class="text-3xl font-bold mb-2">
                                {{ $highlightedBlog->title }}
                            </h2>
                            <p class="text-sm text-gray-300 mb-2">
                                {{ $highlightedBlog->author }} ·
                                {{ \Carbon\Carbon::parse($highlightedBlog->published_at)->format('d M Y') }}
                            </p>
                            <p class="text-gray-200 max-w-2xl text-md md:text-sm leading-relaxed">
                                {{ \Illuminate\Support\Str::limit(strip_tags($highlightedBlog->content), 150, '...') }}
                            </p>
                        </div>
                    </a>
                </section>
            @endif
            <!-- BLOG MAIN HEADER -->

            <!-- BLOG CTA (BRING IT TO SUBMIT FORM IDEA ON BOTTOM) -->
            <section class="max-w-5xl mx-auto text-center md:text-left">
                <div
                    class="bg-palette-3 text-white rounded-2xl shadow-md flex flex-col md:flex-row items-center justify-between gap-4 px-4 py-8">
                    <!-- Left: Text -->
                    <div class="flex-1">
                        <h3 class="text-3xl md:text-2xl font-semibold mb-1 md:ml-7">Got something to share?</h3>
                        <p class="text-palette-4 text-sm md:text-base md:ml-7">
                            Submit your own blog and inspire others with your story.
                        </p>
                    </div>

                    <!-- Right: Button -->
                    <div class="flex justify-center md:justify-end w-full md:w-auto">
                        <button onclick="document.getElementById('submitBlogForm').scrollIntoView({ behavior: 'smooth' })"
                            class="bg-white text-palette-3 font-semibold px-8 py-3 rounded-full 
                       hover:bg-gray-100 transition duration-300 shadow-md hover:shadow-lg md:mr-12">
                            Submit Your Idea
                        </button>
                    </div>
                </div>
            </section>

            {{-- Blog List --}}
            <div class="space-y-10">
                @forelse ($blogs as $blog)
                    <a href="{{ route('blog.detail', $blog->slug) }}"
                        class="flex flex-col md:flex-row items-start gap-6 border-b pb-6 mt-16 
                        transition-transform duration-500 transform hover:scale-[1.02] hover:shadow-lg hover:border-gray-300 rounded-2xl p-4">

                        {{-- Blog Text --}}
                        <div class="flex-1">
                            <h2 class="font-bold text-lg mb-1 leading-snug text-palette-3">
                                {{ $blog->title }}
                            </h2>

                            <p class="text-sm text-gray-500 mb-2">
                                {{ $blog->author }} |
                                {{ \Carbon\Carbon::parse($blog->published_at)->format('d M Y') }}
                            </p>
                            <p class="text-palette-2 text-sm leading-relaxed">
                                {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 150, '...') }}
                            </p>
                        </div>

                        {{-- Blog Thumbnail --}}
                        <img src="{{ $blog->img ? Storage::url($blog->img) : asset('images/blog.png') }}"
                            alt="Blog Thumbnail" class="w-full md:w-48 h-48 md:h-28 rounded-lg object-cover shadow-md">
                    </a>

                @empty
                    <p class="text-gray-500 text-center mt-10">Belum ada blog yang tersedia.</p>
                @endforelse
            </div>

            <!-- paginate -->
            @if ($blogs->hasPages())
                <div class="flex justify-center mt-10 space-x-2">
                    <!-- link ke hal pertama -->
                    @if ($blogs->onFirstPage())
                        <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">
                            First
                        </span>
                    @else
                        <a href="{{ $blogs->url(1) }}"
                            class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200 transition duration-200">
                            First
                        </a>
                    @endif

                    <!-- link paginate ke hal sebelumnya -->
                    @if ($blogs->onFirstPage())
                        <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">
                            Prev
                        </span>
                    @else
                        <a href="{{ $blogs->previousPageUrl() }}"
                            class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200 transition duration-200">
                            Prev
                        </a>
                    @endif

                    <!-- elemen paginate -->
                    @foreach ($blogs->links()->elements[0] ?? [] as $page => $url)
                        @if ($page == $blogs->currentPage())
                            <span class="px-4 py-2 bg-palette-3 text-white rounded-lg shadow">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200 transition duration-200">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    <!-- paginate ke hal selanjutnya -->
                    @if ($blogs->hasMorePages())
                        <a href="{{ $blogs->nextPageUrl() }}"
                            class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200 transition duration-200">
                            Next
                        </a>
                    @else
                        <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">
                            Next
                        </span>
                    @endif

                    <!-- paginate ke hal akhir -->
                    @if ($blogs->currentPage() == $blogs->lastPage())
                        <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">
                            Last
                        </span>
                    @else
                        <a href="{{ $blogs->url($blogs->lastPage()) }}"
                            class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200 transition duration-200">
                            Last
                        </a>
                    @endif
                </div>
            @endif

            <div id="submitBlogForm" class="mt-12 bg-white shadow-md rounded-lg p-10">
                <h2 class="text-4xl font-semibold mb-2">Submit your Idea</h2>
                <p class="text-gray-500 text-sm mb-7">Submit your own blog and inspire others with your story.</p>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <strong class="font-bold">Oops! Ada yang perlu diperbaiki.</strong>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/submit-blog" method="POST" class="space-y-4 max-w-xl">
                    @csrf

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" placeholder="Use your valid email" required
                            value="{{ old('email') }}"
                            class="w-full border px-7 py-2 rounded-2xl
                      focus:outline-none focus:ring focus:ring-palette-4 text-sm transition duration-300">
                    </div>

                    <div>
                        <label for="subject" class="block mb-2 text-sm font-medium text-gray-700">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="Enter the blog title" required
                            value="{{ old('subject') }}"
                            class="w-full border px-7 py-2
                      focus:outline-none focus:ring focus:ring-palette-4 text-sm rounded-2xl transition duration-300">
                    </div>

                    <div>
                        <label for="content" class="block mb-2 text-sm font-medium text-gray-700">Blog Content</label>
                        <textarea id="content" name="content" placeholder="Enter blog content here ..." required
                            class="w-full border px-7 py-5 rounded-2xl
                         focus:outline-none focus:ring focus:ring-palette-4 h-36 text-sm transition duration-300">{{ old('content') }}</textarea>
                    </div>

                    <button type="submit"
                        class="bg-palette-2 text-white w-full py-2 rounded-full transition-transform duration-500 transform hover:scale-[1.02] hover:shadow-lg hover:border-gray-300">
                        Submit
                    </button>
                </form>
            </div>
    </div>

    </section>

    <!-- section partner -->
<section class="px-6">
</section>

    </div>
@endsection
