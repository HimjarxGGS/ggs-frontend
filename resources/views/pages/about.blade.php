@extends('layouts.app')

@section('title', 'About us - Green Generation Surabaya')

@section('content')
<!-- start hero Section -->
<section class="w-full px-6 md:px-12 py-28">
  <div class="max-w-full mx-auto text-left ml-0 md:ml-28 mt-28">
    <h1 class="text-4xl md:text-6xl font-extralight text-black leading-tight">
      Change Begins with <span class="font-semibold text-palette-2">You(th)</span>
    </h1>

    <p class="text-xs md:text-sm mt-5 pl-1">
      <span class="font-bold text-palette-3">Green Generation</span> is a Independent Organizations Working on the #Environment in Indonesia. 
    </p>
</section>
<!-- section hero end -->

<!-- section foto start -->
<section id="our-showcase" class="w-full mx-auto px-[20px] py-20">
  <div class="w-full overflow-x-hidden">
    <div class="flex gap-5 py-5 whitespace-nowrap animate-infinite-scroll">
    
    <!-- card -->
      <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('images/dummyphoto.png') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Judul Foto</span>
          </div>
        </div>
      </div>
      <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('images/dummyphoto.png') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Judul Foto</span>
          </div>
        </div>
      </div>
      <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('images/dummyphoto.png') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Judul Foto</span>
          </div>
        </div>
      </div>
      <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('images/dummyphoto.png') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Judul Foto</span>
          </div>
        </div>
      </div>
      <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('images/dummyphoto.png') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Judul Foto</span>
          </div>
        </div>
      </div>
      <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('images/dummyphoto.png') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Judul Foto</span>
          </div>
        </div>
      </div>
      <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('images/dummyphoto.png') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Judul Foto</span>
          </div>
        </div>
      </div>
      <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('images/dummyphoto.png') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Judul Foto</span>
          </div>
        </div>
      </div>
  </div>
</div>

<!-- Baris scroll kiri ke kanan -->
<div class="w-full overflow-x-hidden">
  <div class="flex gap-5 py-5 whitespace-nowrap animate-infinite-scroll-reverse">

  <!-- card -->
     <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('images/imageggs.png') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Judul Foto</span>
          </div>
        </div>
      </div>
     <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('images/imageggs.png') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Judul Foto</span>
          </div>
        </div>
      </div>
     <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('images/imageggs.png') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Judul Foto</span>
          </div>
        </div>
      </div>
     <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('images/imageggs.png') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Judul Foto</span>
          </div>
        </div>
      </div>
     <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('images/imageggs.png') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Judul Foto</span>
          </div>
        </div>
      </div>
     <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('images/imageggs.png') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Judul Foto</span>
          </div>
        </div>
      </div>
     <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('images/imageggs.png') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Judul Foto</span>
          </div>
        </div>
      </div>
     <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('images/imageggs.png') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Judul Foto</span>
          </div>
        </div>
      </div>
       <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('images/imageggs.png') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Judul Foto</span>
          </div>
        </div>
      </div>
  </div>
 </div>
</section>
<!-- section foto end -->

<!-- section timeline start -->
<section class="w-full px-6 py-20 max-w-7xl mx-auto">
  <div class="flex flex-col lg:flex-row gap-16">
    
    <!-- nama section -->
    <div class="lg:w-1/3">
      <h2 class="text-3xl font-bold">Journey</h2>
      <p class="text-palette-4 text-base">Green Generation Surabaya</p>
    </div>

    <!-- timeline -->
    <div class="lg:w-2/3">
      <!-- garis timeline -->
      <ol class="relative border-s border-gray-200">

        <!-- timeline -->
        <li class="mb-12 ms-6">
          <span class="absolute flex items-center justify-center w-6 h-6 bg-palette-1 rounded-full -start-3 ring-8 ring-white">
            <svg class="w-2.5 h-2.5 text-palette-5" fill="currentColor" viewBox="0 0 20 20">
              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
            </svg>
          </span>
          <h3 class="text-xl font-semibold text-gray-900" data-aos="fade-left">Growave</h3>
          <time class="block mb-4 text-sm text-gray-500" data-aos="fade-left">Released on June 4th, 2025</time>
          <p class="mb-3 text-sm text-gray-600" data-aos="fade-left">Grow Action for Volunteer Engagement in Mangrove Planting</p>
          <img src="{{ asset('images/imageggs.png') }}" class="rounded-md w-52 max-w-sm" alt="Growave Event" data-aos="fade-left">
        </li>

        <li class="mb-12 ms-6">
          <span class="absolute flex items-center justify-center w-6 h-6 bg-palette-1 rounded-full -start-3 ring-8 ring-white">
            <svg class="w-2.5 h-2.5 text-palette-5" fill="currentColor" viewBox="0 0 20 20">
              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
            </svg>
          </span>
          <h3 class="text-xl font-semibold text-gray-900" data-aos="fade-left">Growave</h3>
          <time class="block mb-4 text-sm text-gray-500" data-aos="fade-left">Released on June 4th, 2025</time>
          <p class="mb-3 text-sm text-gray-600" data-aos="fade-left">Grow Action for Volunteer Engagement in Mangrove Planting</p>
          <img src="{{ asset('images/imageggs.png') }}" class="rounded-md w-52 max-w-sm" alt="Growave Event" data-aos="fade-left">
        </li>

        <li class="mb-12 ms-6">
          <span class="absolute flex items-center justify-center w-6 h-6 bg-palette-1 rounded-full -start-3 ring-8 ring-white">
            <svg class="w-2.5 h-2.5 text-palette-5" fill="currentColor" viewBox="0 0 20 20">
              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
            </svg>
          </span>
          <h3 class="text-xl font-semibold text-gray-900" data-aos="fade-left">Growave</h3>
          <time class="block mb-4 text-sm text-gray-500" data-aos="fade-left">Released on June 4th, 2025</time>
          <p class="mb-3 text-sm text-gray-600" data-aos="fade-left">Grow Action for Volunteer Engagement in Mangrove Planting</p>
          <img src="{{ asset('images/imageggs.png') }}" class="rounded-md w-52 max-w-sm" alt="Growave Event" data-aos="fade-left">
        </li>
      </ol>
    </div>
  </div>
</section>
<!-- section timeline end -->

<!-- section principal start -->
<section class="bg-gray-50 py-10 px-6">
  <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center lg:items-start gap-10">

    <div class="lg:w-1/2">
      <h2 class="text-3xl md:text-3xl font-bold mb-1 text-black">
        We nurture youth-led <br class="hidden md:block"> change for a <span class="text-palette-2">greener</span> future
      </h2>
      <p class="text-gray-500 text-sm md:text-sm">
        Empowering youth through values <br class="hidden sm:block">that protect nature
      </p>
    </div>

    <div class="lg:w-1/2 flex justify-center">
      <img src="{{ asset('icons/led.svg') }}" alt="Visual Element" class="max-w-full h-auto object-contain">
    </div>

  </div>

    <!-- section living sustainably & leading with purpose -->
    <div class="max-w-5xl mx-auto mt-14 grid grid-cols-1 md:grid-cols-2 gap-10">

      <!-- living sustainably -->
      <div class="flex gap-4 items-start">
        <div class="flex-shrink-0">
          <img src="{{ asset('icons/living.svg') }}" alt="icon" class="w-10 h-10">
        </div>
        <div>
          <h3 class="text-lg font-semibold text-palette-2 mb-1">Living Sustainable</h3>
          <p class="text-sm text-gray-500 leading-relaxed">
            Encouraging eco-conscious choices in everyday life, and promoting a sustainable mindset for long-term change.
          </p>
        </div>
      </div>

       <!-- leading with purpose -->
      <div class="flex gap-4 items-start">
        <div class="flex-shrink-0">
          <img src="{{ asset('icons/lwp.svg') }}" alt="icon" class="w-10 h-10">
        </div>

        <div>
          <h3 class="text-lg font-semibold text-palette-2 mb-1">Leading with Purpose</h3>
          <p class="text-sm text-gray-500 leading-relaxed">Inspiring youth to take action not just for themselves, but for the betterment of the planet and future generations.</p>
        </div>
      </div>
    </div>
</section>

<section class="bg-white py-24 px-6">
  <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-12">

    <!-- teks faq -->
    <div class="lg:w-1/2">
      <h2 class="text-3xl md:text-4xl font-bold text-black mb-3">FAQ</h2>
      <p class="text-gray-500 text-sm md:text-base">
        Maybe our frequently asked questions could help you out.
      </p>
    </div>

    <!-- accordion -->
    <div class="lg:w-1/2 space-y-4" x-data>
      
      <!-- accordion 1 -->
      <div class="border-b pb-4" x-data="{ open: false }" data-aos="zoom-out-down">
        <button @click="open = !open" class="flex justify-between w-full text-left text-sm md:text-base font-medium text-gray-800">
          What is Green Generation?
          <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div x-show="open" x-transition class="mt-3 text-gray-600 text-sm">
          Green Generation is a youth initiative that promotes sustainable living and environmental awareness through real-world action.
        </div>
      </div>

      <!-- accordion 2 -->
      <div class="border-b pb-4" x-data="{ open: false }" data-aos="zoom-out-down">
        <button @click="open = !open" class="flex justify-between w-full text-left text-sm md:text-base font-medium text-gray-800">
          How to join event Green Generation Surabaya?
          <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div x-show="open" x-transition class="mt-3 text-gray-600 text-sm">
          You can follow our social media and register during our open recruitment period, which is announced periodically.
        </div>
      </div>

    </div>

  </div>
</section>

@endsection