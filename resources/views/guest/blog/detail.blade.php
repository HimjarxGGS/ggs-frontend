@extends('guest.layouts.app')

@section('title', 'Detail Blog - ' . $blog->title)

@section('content')
<div class="min-h-screen flex flex-col">

    {{-- Blog Detail Section --}}
    <section class="max-w-5xl mx-auto py-10 px-5 flex-1">

        {{-- Breadcrumb --}}
        <div class="mt-20 mb-5 text-sm text-gray-500">
            <a href="/" class="hover:underline text-palette-5 transition duration-300">Home</a> /
            <a href="{{ route('blog.index') }}" class="hover:underline text-palette-5 transition duration-300">Blog</a> /
            <span class="text-gray-800">{{ $blog->title }}</span>
        </div>

        {{-- Blog Image --}}
        <div class="mb-8">
            <img
                src="{{ $blog->img ? asset('storage/' . $blog->img) : asset('images/blog.png') }}"
                alt="{{ $blog->title }}"
                class="w-full h-48 md:h-80 object-cover rounded-lg shadow">
        </div>

        {{-- Blog Title & Info --}}
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl font-bold mb-2 text-palette-3">
                {{ $blog->title }}
            </h1>
            <p class="text-sm text-gray-500">
                {{ $blog->author }} | {{ \Carbon\Carbon::parse($blog->published_at)->translatedFormat('d F Y') }}
            </p>
        </div>

        {{-- Blog Content --}}
        <article class="blog-content text-palette-2 leading-relaxed space-y-4 break-words whitespace-normal max-w-none text-justify">
            {{-- sanitize: izinkan tag teks & gambar tapi hapus input / form --}}
            {!! strip_tags($blog->content, '<p><a><em><ul><ol><li><br><h1><h2><h3><img><blockquote><figure><figcaption><pre><code>') !!}
        </article>

        <section class="mt-16">
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
                              <h3 class="text-sm font-semibold leading-tight text-palette-3 mt-2">
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
                      <p class="col-span-3 text-center text-gray-500 py-10">
                          Belum ada blog lain untuk ditampilkan.
                      </p>
                  @endforelse
            </div>
          </div>
        </section>

      
       {{-- Blog Submission Section --}}
      <section class="py-16 px-5 bg-white">
        <div class="max-w-4xl mx-auto bg-palette-3 shadow-md rounded-3xl p-10">
            <h2 class="md:text-4xl font-semibold mb-2 text-palette-1 text-2xl md:text-left text-center">Submit your Idea</h2>
            <p class="text-gray-300 md:text-sm text-xs md:text-left text-center mb-7">Submit your own blog and inspire others with your story.</p>

            {{-- Success Message --}}
            @if (session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        document.getElementById('submitBlogForm')?.scrollIntoView({ behavior: 'smooth' });
                        setTimeout(() => document.getElementById('successBanner')?.remove(), 7000);
                    });
                </script>
                <div id="successBanner" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Error Message --}}
            @if ($errors->any())
                <div id="errorBanner" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Oops! Ada yang perlu diperbaiki.</strong>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form --}}
            <form action="{{route('blog.submit')}}" method="POST" class="space-y-4 max-w-xl mx-auto md:mx-0" id="submitBlogForm">
                @csrf
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-palette-1">Email</label>
                    <input type="email" id="email" name="email" placeholder="Use your valid email" required
                          value="{{ old('email') }}"
                          class="w-full px-7 py-2 rounded-2xl focus:outline-none focus:ring focus:ring-palette-4 text-sm transition duration-300 bg-palette-1 text-palette-2">
                </div>

                <div>
                    <label for="subject" class="block mb-2 text-sm font-medium text-palette-1">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="Enter the blog title" required
                          value="{{ old('subject') }}"
                          class="w-full px-7 py-2 focus:outline-none focus:ring focus:ring-palette-4 text-sm rounded-2xl transition duration-300 bg-palette-1 text-palette-2">
                </div>

                <div>
                    <label for="content" class="block mb-2 text-sm font-medium text-palette-1">Blog Content</label>
                    <textarea id="content" name="content" placeholder="Enter blog content here ..." required
                              class="w-full px-7 py-5 rounded-2xl focus:outline-none focus:ring focus:ring-palette-4 h-36 text-sm transition duration-300 bg-palette-1 text-palette-2">{{ old('content') }}</textarea>
                </div>

                <button type="submit"
                        class="bg-palette-4 text-white w-full py-2 rounded-full transition-transform duration-500 transform hover:scale-[1.02] hover:shadow-lg hover:border-gray-300">
                    Submit
                </button>
            </form>
        </div>
      </section>
</div>
@endsection