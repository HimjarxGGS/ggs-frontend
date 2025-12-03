@extends('guest.layouts.app')

@section('title', 'Blog - Green Generation Surabaya')

@section('content')
<div class="min-h-screen flex flex-col">

    {{-- Blog Section --}}
    <section class="max-w-sm sm:max-w-lg md:max-w-5xl mx-auto py-12 px-4 sm:px-6 flex-1 items-center">
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
        <section class="mb-4 mt-4">
            <a href="{{ route('blog.detail', $highlightedBlog->slug) }}"
                class="group block relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl duration-1000 ease-in-out transition-transform transform hover:scale-[1.02]">
                <img
                    src="{{ $highlightedBlog->img ? asset('storage/' . $highlightedBlog->img) : asset('images/blog.png') }}"
                    alt="Featured Blog Image"
                    class="w-full h-80 object-cover brightness-90 group-hover:brightness-75 transition duration-300">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

                <div class="absolute bottom-0 left-0 p-8 text-white">
                    <h2 class="text-xl md:text-3xl font-bold mb-2">
                        {{ \Illuminate\Support\Str::limit(strip_tags($highlightedBlog->title), 150, '...')  }}
                    </h2>
                    <p class="text-xs md:text-sm text-gray-200 mb-2">
                        {{ $highlightedBlog->author }} · {{ \Carbon\Carbon::parse($highlightedBlog->published_at)->format('d M Y') }}
                    </p>
                    <p class="text-palette-1 max-w-2xl text-xs md:text-sm">
                        {{ \Illuminate\Support\Str::limit(strip_tags($highlightedBlog->content), 150, '...') }}
                    </p>
                </div>
            </a>
        </section>
        @endif

        <!-- BLOG MAIN HEADER -->

        <!-- BLOG CTA (BRING IT TO SUBMIT FORM IDEA ON BOTTOM) -->
        <section class="mx-auto text-center md:text-left">
            <div class="bg-palette-3 text-white rounded-2xl shadow-md flex flex-col md:flex-row items-center justify-between md:px-10 py-4">
                <!-- Left: Text -->
                <div class="flex-1">
                    <h3 class="text-3xl md:text-2xl font-semibold">Got something to share?</h3>
                    <p class="text-sm text-yellow-50 pt-2 md:pt-0.5">
                        Submit your own blog and inspire <span class="block md:hidden"><span class="hidden md:inline"></span>others with your story.
                    </p>
                </div>

                <!-- Right: Button -->
                <div class="flex justify-center md:justify-end w-full md:w-auto md:pt-0 sm:pt-3">
                    <button
                        onclick="document.getElementById('submitBlogForm').scrollIntoView({ behavior: 'smooth' })"
                        class="bg-white text-palette-3 font-semibold px-8 py-3 rounded-full 
                       hover:bg-yellow-50 transition duration-300 shadow-md hover:shadow-lg">
                        Submit Your Idea
                    </button>
                </div>
            </div>
        </section>
        <!-- BLOG CTA (BRING IT TO SUBMIT FORM IDEA ON BOTTOM) -->

        <!-- Blog List -->
        <div class="space-y-10">
            @forelse ($blogs as $blog)

            <a href="{{ route('blog.detail', $blog->slug) }}"
                class="flex flex-col-reverse md:flex-row items-start gap-6 border-b pb-6 mt-16 
                        transition-transform duration-500 transform hover:scale-[1.02] hover:shadow-lg hover:border-gray-300 rounded-2xl p-4 shadow-sm">

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

                <!-- thumbnail -->
                <img
                    src="{{ $blog->img ? Storage::url($blog->img) : asset('images/blog.png') }}"
                    alt="Blog Thumbnail"
                    class="w-full md:w-48 h-48 md:h-28 rounded-lg object-cover shadow-md">
            </a>

            @empty
            <p class="text-gray-500 text-center mt-10">Belum ada blog yang tersedia.</p>
            @endforelse
        </div>

        <!-- paginate -->
        @if ($blogs->hasPages())
        <div class="flex justify-center mt-10">
            <div class="flex space-x-2">

                <!-- mobile -->
                <div class="flex md:hidden space-x-2 text-sm">

                    <!-- first -->
                    @if ($blogs->onFirstPage())
                    <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">First</span>
                    @else
                    <a href="{{ $blogs->url(1) }}"
                        class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">First</a>
                    @endif

                    <!-- prev -->
                    @if ($blogs->onFirstPage())
                    <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Prev</span>
                    @else
                    <a href="{{ $blogs->previousPageUrl() }}"
                        class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Prev</a>
                    @endif

                    <!-- current -->
                    <span class="px-3 py-2 bg-palette-3 text-white rounded-lg shadow">
                        {{ $blogs->currentPage() }}
                    </span>

                    <!-- next page number -->
                    @if ($blogs->currentPage() < $blogs->lastPage())
                        <a href="{{ $blogs->url($blogs->currentPage() + 1) }}"
                            class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">
                            {{ $blogs->currentPage() + 1 }}
                        </a>
                        @endif

                        <!-- next -->
                        @if ($blogs->hasMorePages())
                        <a href="{{ $blogs->nextPageUrl() }}"
                            class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Next</a>
                        @else
                        <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Next</span>
                        @endif

                        <!-- last -->
                        @if ($blogs->currentPage() == $blogs->lastPage())
                        <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Last</span>
                        @else
                        <a href="{{ $blogs->url($blogs->lastPage()) }}"
                            class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Last</a>
                        @endif
                </div>

                <!-- desktop -->
                <div class="hidden md:flex space-x-2">
                    <!-- first -->
                    @if ($blogs->onFirstPage())
                    <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">First</span>
                    @else
                    <a href="{{ $blogs->url(1) }}"
                        class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">First</a>
                    @endif

                    <!-- prev -->
                    @if ($blogs->onFirstPage())
                    <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Prev</span>
                    @else
                    <a href="{{ $blogs->previousPageUrl() }}"
                        class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Prev</a>
                    @endif

                    <!-- numbered pages with ellipsis -->
                    @php
                    $start = max(1, $blogs->currentPage() - 2);
                    $end = min($blogs->lastPage(), $blogs->currentPage() + 2);
                    @endphp

                    @if ($start > 1)
                    <a href="{{ $blogs->url(1) }}" class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">1</a>
                    @if ($start > 2)
                    <span class="px-3 py-2">…</span>
                    @endif
                    @endif

                    @for ($i = $start; $i <= $end; $i++)
                        @if ($i==$blogs->currentPage())
                        <span class="px-4 py-2 bg-palette-3 text-white rounded-lg shadow">{{ $i }}</span>
                        @else
                        <a href="{{ $blogs->url($i) }}"
                            class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">{{ $i }}</a>
                        @endif
                        @endfor

                        @if ($end < $blogs->lastPage())
                            @if ($end < $blogs->lastPage() - 1)
                                <span class="px-3 py-2">…</span>
                                @endif
                                <a href="{{ $blogs->url($blogs->lastPage()) }}"
                                    class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">{{ $blogs->lastPage() }}</a>
                                @endif

                                <!-- next -->
                                @if ($blogs->hasMorePages())
                                <a href="{{ $blogs->nextPageUrl() }}"
                                    class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Next</a>
                                @else
                                <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Next</span>
                                @endif

                                <!-- last -->
                                @if ($blogs->currentPage() == $blogs->lastPage())
                                <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Last</span>
                                @else
                                <a href="{{ $blogs->url($blogs->lastPage()) }}"
                                    class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Last</a>
                                @endif
                </div>
            </div>
        </div>
        @endif

        {{-- Blog Submission Section --}}
        <section class="py-16 px-5">
            <div id="submitBlogForm"
                class="bg-palette-3 shadow-md rounded-3xl p-10 w-full mx-auto">
                <!-- class="bg-palette-3 shadow-md rounded-3xl p-10 flex-auto flex-col md:flex-row gap-10 w-full justify-center"> -->
                <h2 class="md:text-4xl font-semibold mb-2 text-white text-xl md:text-left text-center">Submit your Idea</h2>
                <p class="text-gray-300 md:text-sm text-sm md:text-left text-center mb-7">Submit your own blog and inspire others with your story.</p>

                @if (session('success'))

                <!-- {{-- Auto-scroll script --}} -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const target = document.getElementById('submitBlogForm');
                        if (target) target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    });
                    // setTimeout(() => {
                    //     const banner = document.getElementById('successBanner');
                    //     if (banner) banner.style.display = 'none';
                    // }, 7000);
                </script>
                <!-- Show pop up notification -->
                
                @endif

                <form action="{{route('blog.submit')}}" method="POST" class="space-y-4 w-full">
                    @csrf

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-white">Email</label>
                        <input type="email" id="email" name="email" placeholder="Your usual email works fine" required
                            value="{{ old('email') }}"
                            class="w-full text-md px-3 py-3 rounded-xl focus:outline-none focus:ring focus:ring-palette-4 transition duration-300 bg-white text-palette-2">
                    </div>

                    <div>
                        <label for="subject" class="block mb-2 text-sm font-medium text-white">Subject - Blog Title</label>
                        <input type="text" id="subject" name="subject" placeholder="A title that feels right to you" required
                            value="{{ old('subject') }}"
                            class="w-full text-md px-3 py-3 rounded-xl focus:outline-none focus:ring focus:ring-palette-4 transition duration-300 bg-white text-palette-2">
                    </div>

                    <div>
                        <label for="content" class="block mb-2 text-sm font-medium text-white">Share your thoughts</label>
                        <textarea id="content" name="content"
                            placeholder="Share your thoughts here"
                            required
                            rows="7"
                            value="{{ old('content') }}"
                            class="w-full text-md px-3 py-3 rounded-xl focus:outline-none focus:ring focus:ring-palette-4 transition duration-300 bg-white text-palette-2">{{ old('content') }}</textarea>
                    </div>

                    <button type="submit"
                        class="bg-white text-pallete-3 w-full py-3 rounded-full font-medium transition-transform duration-500 transform hover:scale-[1.02] hover:shadow-lg hover:border-gray-300">
                        Share My Thoughts and Idea
                    </button>
                </form>
            </div>
        </section>

        <!-- our partner -->
        <section class="px-6">

            <div class="flex flex-col lg:flex-row md:items-center justify-center gap-10">
                <div class="text-left lg:text-left">
                    <h2 class="text-5xl font-bold text-palette-5">
                        our <span class="font-bold">Partners</span>
                    </h2>
                    <p class="text-gray-500">Green Generation Surabaya</p>
                </div>
                <div class="hidden lg:block w-80 h-0.5 bg-gray-300"></div>
            </div>

            <!-- logo partner -->
            <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-x-8 gap-y-10 max-w-6xl mx-auto mt-14 place-items-center">
                <div class="flex justify-center items-center h-24" data-aos="zoom-in-up" data-aos-delay="0" data-aos-duration="700">
                    <img src="{{ asset('images/aisec.png') }}" alt="AIESEC" class="max-h-24 object-contain" />
                </div>
                <div class="flex justify-center items-center h-24" data-aos="zoom-in-up" data-aos-delay="100" data-aos-duration="700">
                    <img src="{{ asset('images/americancorner.png') }}" alt="American Corner" class="max-h-24 object-contain" />
                </div>
                <div class="flex justify-center items-center h-24" data-aos="zoom-in-up" data-aos-delay="200" data-aos-duration="700">
                    <img src="{{ asset('images/gojek.png') }}" alt="Gojek" class="max-h-24 object-contain" />
                </div>
                <div class="flex justify-center items-center h-24" data-aos="zoom-in-up" data-aos-delay="300" data-aos-duration="700">
                    <img src="{{ asset('images/kahf.png') }}" alt="Kahf" class="max-h-24 object-contain" />
                </div>
                <div class="flex justify-center items-center h-24" data-aos="zoom-in-up" data-aos-delay="400" data-aos-duration="700">
                    <img src="{{ asset('images/komdigi.png') }}" alt="Komdigi" class="max-h-24 object-contain" />
                </div>
                <div class="flex justify-center items-center h-24" data-aos="zoom-in-up" data-aos-delay="500" data-aos-duration="700">
                    <img src="{{ asset('images/komunitasnarasijatim.png') }}" alt="Komunitas Narasi Jatim" class="max-h-24 object-contain" />
                </div>
                <div class="flex justify-center items-center h-24" data-aos="zoom-in-up" data-aos-delay="600" data-aos-duration="700">
                    <img src="{{ asset('images/noovoleum.png') }}" alt="Noovoleum" class="max-h-24 object-contain" />
                </div>
                <div class="flex justify-center items-center h-24" data-aos="zoom-in-up" data-aos-delay="700" data-aos-duration="700">
                    <img src="{{ asset('images/hi.png') }}" alt="Human Initiative" class="max-h-24 object-contain" />
                </div>
                <div class="flex justify-center items-center h-24" data-aos="zoom-in-up" data-aos-delay="800" data-aos-duration="700">
                    <img src="{{ asset('images/pepelingasihindonesia.png') }}" alt="Pepelingasih Indonesia" class="max-h-24 object-contain" />
                </div>
                <div class="flex justify-center items-center h-24" data-aos="zoom-in-up" data-aos-delay="900" data-aos-duration="700">
                    <img src="{{ asset('images/uwk.png') }}" alt="UWK" class="max-h-20 object-contain" />
                </div>
                <div class="flex justify-center items-center h-24" data-aos="zoom-in-up" data-aos-delay="1000" data-aos-duration="700">
                    <img src="{{ asset('images/tus.png') }}" alt="TUS" class="max-h-24 object-contain" />
                </div>
                <div class="flex justify-center items-center h-24" data-aos="zoom-in-up" data-aos-delay="1100" data-aos-duration="700">
                    <img src="{{ asset('images/fpci.png') }}" alt="FPCI" class="max-h-24 object-contain" />
                </div>
            </div>
        </section>
    </section>
</div>
@endsection