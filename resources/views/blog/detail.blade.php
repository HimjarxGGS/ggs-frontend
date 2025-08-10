@extends('guest.layouts.app')

@section('content')
<div class="min-h-screen flex flex-col">

    {{-- Blog Detail Section --}}
    <section class="max-w-5xl mx-auto py-10 px-5 flex-1">

        {{-- Breadcrumb --}}
        <div class="mt-20 mb-5 text-sm text-gray-500">
            <a href="/" class="hover:underline text-green-600">Home</a> /
            <a href="/blog" class="hover:underline text-green-600">Blog</a> /
            <span class="text-gray-800">Detail Blog</span>
        </div>

        {{-- Blog Image --}}
        <div class="mb-8">
            <img 
                src="{{ asset('images/blog.png') }}" 
                alt="Detail Blog Image"
                class="w-full h-80 object-cover rounded-lg shadow">
        </div>

        {{-- Blog Title & Info --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold mb-2">Judul Blog Lorem Ipsum Dolor</h1>
            <p class="text-sm text-gray-500">
                Green Generation Surabaya | {{ now()->format('d M Y') }} | Environment
            </p>
        </div>

        {{-- Blog Content --}}
        <div class="text-gray-700 leading-relaxed space-y-4 text-justify">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. 
            Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.</p>

            <p>Nam nec ante. Sed lacinia, urna non tincidunt mattis, tortor neque adipiscing diam, a cursus ipsum ante quis turpis. 
            Nulla facilisi. Ut fringilla. Suspendisse potenti.</p>
        </div>

      {{-- Green Message Section (from uploaded image) --}}
<div class="mb-16 mt-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <img src="{{ asset('images/blog.png') }}" alt="Ilustrasi Plastik Laut 1" class="rounded-lg w-full">
        <img src="{{ asset('images/blog.png') }}" alt="Ilustrasi Plastik Laut 2" class="rounded-lg w-full">
    </div>
    <p class="text-gray-700 text-sm md:text-base text-center">
        Dengan memulai dari hal kecil, kamu bisa menjadi bagian dari perubahan besar. Ingat, bumi ini rumah kita bersama. 
        Yuk, bergerak bersama Green Generation untuk masa depan yang lebih hijau!
    </p>
</div>


        {{-- Related Posts Section --}}
        <div class="mt-16">
            <h2 class="text-2xl font-semibold mb-6">Related</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @for ($i = 0; $i < 4; $i++)
                <div class="space-y-2">
                    <img 
                        src="{{ asset('images/blog.png') }}" 
                        alt="Related Blog Image" 
                        class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-sm font-semibold leading-tight">
                        5 Cara Mudah Mengurangi Sampah Plastik di Kehidupan Sehari-hari
                    </h3>
                    <p class="text-xs text-gray-500">
                        8 Juli 2025<br>
                        Green Generation Surabaya
                    </p>
                </div>
                @endfor
            </div>
        </div>

        {{-- Comment Section --}}
        <div class="mt-12">
            <h2 class="text-xl font-semibold mb-4">Submit Comment</h2>
            <p class="text-gray-500 text-sm mb-4">Your email address will not be published. Required fields are marked *</p>
            <form class="space-y-4 max-w-xl">
                <div>
                    <input type="email" placeholder="Enter email*" 
                           class="w-full border px-4 py-2 rounded 
                                  focus:outline-none focus:ring focus:ring-green-300">
                </div>
                <div>
                    <input type="text" placeholder="Enter name*" 
                           class="w-full border px-4 py-2 rounded 
                                  focus:outline-none focus:ring focus:ring-green-300">
                </div>
                <div>
                    <textarea placeholder="Enter comment*" 
                              class="w-full border px-4 py-2 rounded 
                                     focus:outline-none focus:ring focus:ring-green-300 h-28"></textarea>
                </div>
                <button type="submit"
                        class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700">
                    Submit
                </button>
            </form>
        </div>
    </section>

    {{-- Our Partners --}}
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

        <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-x-7 gap-y-8 px-4 max-w-6xl mx-auto mt-14">
            <img src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <img src="{{ asset('images/cnn.png') }}" alt="" class="h-20"/>
            <img src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <img src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <img src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <img src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
        </div>
    </section>
</div>
@endsection
