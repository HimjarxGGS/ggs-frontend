@extends('guest.layouts.app')

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
        <div class="text-palette-2 leading-relaxed space-y-4">
            {!! nl2br(e($blog->content)) !!}
        </div>

        {{-- Related Posts Section (dummy dulu) --}}
        <div class="mt-16">
            <h2 class="text-2xl font-semibold mb-6">Related</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @for ($i = 0; $i < 4; $i++)
                <div class="space-y-2">
                    <img 
                        src="{{ asset('images/blog.png') }}" 
                        alt="Related Blog Image" 
                        class="w-full h-32 md:h-40 object-cover rounded-lg">
                    <h3 class="text-sm font-semibold leading-tight text-palette-3">
                        Related Blog {{ $i+1 }}
                    </h3>
                    <p class="text-xs text-gray-500">
                        {{ now()->format('d M Y') }}<br>
                        Dummy Author
                    </p>
                </div>
                @endfor
            </div>
        </div>

        {{-- Comment Section (dummy) --}}
        <div class="mt-16 bg-white shadow-md rounded-2xl p-20">
            <h2 class="text-4xl font-semibold mb-2">Submit Comment</h2>
            <p class="text-gray-500 text-sm mb-4">Your email address will not be published. Required fields are marked *</p>
            <form class="space-y-4 max-w-xl mt-10">
                <div>
                    <input type="email" placeholder="Enter email*" 
                           class="w-80 border px-4 py-2 rounded 
                                  focus:outline-none focus:ring focus:ring-palette-4 text-sm transition duration-300">
                </div>
                <div>
                    <input type="text" placeholder="Enter name*" 
                           class="w-80 border px-4 py-2 rounded 
                                  focus:outline-none focus:ring focus:ring-palette-4 text-sm transition duration-300">
                </div>
                <div>
                    <textarea placeholder="Enter comment*" 
                              class="w-full border px-4 py-2 rounded 
                                     focus:outline-none focus:ring focus:ring-palette-4 h-28 text-sm transition duration-300"></textarea>
                </div>
                <button type="submit"
                        class=" bg-palette-2 text-white px-40 py-2 rounded-xl hover:bg-palette-2 transition ease-in-out duration-300 hover:shadow-lg hover:shadow-gray-600">
                    Submit
                </button>
            </form>
        </div>
    </section>

    {{-- Our Partners (dummy) --}}
    <section class="pt-24 px-6">
        <div class="flex flex-col lg:flex-row md:items-center justify-center gap-10">
            <div class="text-left lg:text-left">
                <h2 class="text-5xl font-bold text-palette-5">
                    our <span class="font-bold">Partners</span>
                </h2>
                <p class="text-gray-500">Lorem Ipsum</p>
            </div>
            <div class="hidden lg:block w-80 h-0.5 bg-gray-300"></div>
        </div>

        <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-x-7 gap-y-8 px-4 max-w-6xl mx-auto mt-14">
            <img src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <img src="{{ asset('images/cnn.png') }}" alt="" class="h-20"/>
            <img src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
        </div>
    </section>
</div>
@endsection
