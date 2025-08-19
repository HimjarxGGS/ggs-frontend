@extends('guest.layouts.app')

@section('title', 'Blog - Green Generation Surabaya')

@section('content')
<div class="min-h-screen flex flex-col bg-gray-50"> {{-- tambahan bg --}}

    {{-- Blog Section --}}
    <section class="max-w-5xl mx-auto py-10 px-5 flex-1">

        {{-- Header: Blog Title + Search --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 mt-20 gap-4">
            <h1 class="text-3xl font-bold text-gray-800">Blog</h1> {{-- tambahan ukuran --}}

            {{-- Search Bar with Icon --}}
            <div class="relative w-96 md:w-80">
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                    <!-- Search Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" 
                        fill="none" stroke="currentColor" stroke-width="2"
                        class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 105.5 5.5a7.5 7.5 0 0011.15 11.15z"/>
                    </svg>
                </span>
                <input type="text" placeholder="Search"
                    class="w-full border border-gray-300 rounded-full pl-10 pr-4 py-2 
                           focus:outline-none focus:ring focus:ring-palette-4 text-sm transition duration-300">
            </div>
        </div>

       {{-- Blog List --}}
        <div class="space-y-8 mt-16">
            @for ($i = 1; $i <= 4; $i++)
                <div class="flex flex-col md:flex-row items-start gap-6 border-b pb-6">
                    {{-- Blog Text --}}
                    <div class="flex-1">
                        <h2  class="font-bold text-lg mb-1 hover:text-palette-4 cursor-pointer leading-snug transition duration-300">
                            Lorem Ipsum Blog Post {{ $i }}
                        </h2>
                        <p class="text-sm text-gray-500 mb-2">
                            Green Generation Surabaya | {{ now()->format('d M Y') }} | Environment
                        </p>
                        <p class="text-palette-2 text-sm leading-relaxed">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt 
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>

                    {{-- Blog Thumbnail --}}
                    <img 
                        src="{{ asset('images/blog.png') }}" 
                        alt="Blog Thumbnail {{ $i }}" 
                        class="w-full md:w-48 h-48 md:h-28 rounded-lg object-cover shadow-md">
                </div>
            @endfor
        </div>

        {{-- Pagination --}}
        <div class="flex justify-between items-center text-gray-400 mt-6 text-sm">
            <a href="#" class="hover:text-palette-3 flex items-center gap-1 transition duration-300">&lt; Older Blog</a>
            <a href="#" class="hover:text-palette-3 flex items-center gap-1 transition duration-300">Next Blog &gt;</a>
        </div>

        {{-- Comment Form --}}
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

   <!-- Section our Partner Start-->
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
  </div>
</section>
<!-- Section our Partner end-->

</div>
@endsection