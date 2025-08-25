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
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2"
                            class="w-7 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 105.5 5.5a7.5 7.5 0 0011.15 11.15z" />
                        </svg>
                    </span>
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari blog"
                        class="w-full border border-gray-300 rounded-full pl-12 pr-4 py-2 
                   focus:outline-none focus:ring focus:ring-palette-4 text-sm transition duration-200">
                </form>
            </div>
        </div>

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
                    <img
                        src="{{ asset('storage/' . $blog->img) }}"
                        alt="Blog Thumbnail"
                        class="w-full md:w-48 h-48 md:h-28 rounded-lg object-cover shadow-md">
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

        {{-- Comment Form (opsional, bisa kamu simpan kalau memang ada di figma) --}}
        <div class="mt-12 bg-white shadow-md rounded-lg p-10">
            <h2 class="text-4xl font-semibold mb-2">Submit your blog!</h2>
            <p class="text-gray-500 text-sm mb-7">Required fields are marked *</p>
            <form class="space-y-4 max-w-xl">
                <div>
                    <input type="email" placeholder="Enter name*"
                        class="w-full border px-7 py-2 rounded-2xl 
                                  focus:outline-none focus:ring focus:ring-palette-4 text-sm transition duration-300">
                </div>
                <div>
                    <input type="text" placeholder="Enter subject*"
                        class="w-full border px-7 py-2 
                                  focus:outline-none focus:ring focus:ring-palette-4 text-sm rounded-2xl transition duration-300">
                </div>
                <div>
                    <textarea placeholder="Enter blog content*"
                        class="w-full border px-7 py-5 rounded-2xl
                                     focus:outline-none focus:ring focus:ring-palette-4 h-28 text-sm transition duration-300"></textarea>
                </div>
                <button type="submit"
                    class="bg-palette-2 text-white w-full py-2 rounded-full transition-transform duration-500 transform hover:scale-[1.02] hover:shadow-lg hover:border-gray-300">
                    Submit
                </button>
            </form>
        </div>
    </section>

    {{-- Partner Section --}}
    <section class="pt-24 px-6">

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
        <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-x-7 gap-y-8 px-4 max-w-6xl mx-auto mt-14">
            <img  src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <img  src="{{ asset('images/cnn.png') }}" alt="" class="h-20"/>
            <img  src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <img  src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <img  src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <img  src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <img  src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <img  src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <img  src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <img  src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <!-- <img  src="" alt="" class="bg-gray-300 rounded-md h-20 flex items-center justify-center text-sm"/> -->
        </div>
    </section>

</div>
@endsection