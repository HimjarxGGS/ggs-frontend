@extends('guest.layouts.app')

@section('title', 'Green Generation Surabaya')

@section('content')
<!-- start hero Section -->
<section class="w-full px-4 md:px-8 py-28">
  <div class="max-w-full mx-auto text-left ml-0 lg:ml-28 mt-28">
    <h1 class="text-4xl md:text-6xl font-extralight text-black leading-tight">
      Change Begins with <span class="font-semibold text-palette-2">You(th)</span>
    </h1>

    <p class="text-xs md:text-sm mt-5 pl-1">
      <span class="font-bold text-palette-3">Green Generation</span> is a Independent Organizations Working on the #Environment in Indonesia.
    </p>

    <!-- button mobile -->
    <div class="mt-6 md:hidden">
      <a href="/event">
        <button class="bg-palette-3 hover:bg-palette-1 text-white font-extralight py-2 px-14 rounded-3xl ease-in-out transition duration-200 flex items-center gap-2">
          <span class="text-sm">View Event</span>
        </button>
      </a>
    </div>
  </div>

  <!-- button Desktop -->
  <div class="hidden lg:flex items-center mt-6 lg:ml-28">
    <a href="/event">
      <button class="bg-palette-3 text-white font-normal py-2 px-20 rounded-3xl flex items-center gap-2 ease-in-out transition duration-300 hover:shadow-lg hover:shadow-black">
        <span>View Event</span>
      </button>
    </a>
  </div>
</section>
<!-- section hero end -->

<!-- section foto start -->
<section id="our-showcase" class="w-full mx-auto px-[20px] py-16">
  <div class="w-full overflow-x-hidden">
    <div class="flex gap-5 py-5 whitespace-nowrap animate-infinite-scroll">
    
    <!-- card -->
      <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('dokum/ggberaksi1.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 1" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">GG-Beraksi</span>
          </div>
        </div>
      </div>
      <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('dokum/ggberaksi2.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 2" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">GG-Beraksi</span>
          </div>
        </div>
      </div>
      <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('dokum/ggberaksi3.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 3" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">GG-Beraksi</span>
          </div>
        </div>
      </div>
      <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('dokum/ggberaksi4.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 4" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">GG-Beraksi</span>
          </div>
        </div>
      </div>
      <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('dokum/greenovation_batch1_1.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 5" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Greenovation</span>
          </div>
        </div>
      </div>
      <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('dokum/greenovation_batch1_2.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 6" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Greenovation</span>
          </div>
        </div>
      </div>
      <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('dokum/growave1.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 7" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Growave</span>
          </div>
        </div>
      </div>
      <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('dokum/trashformerpart1-1.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 8" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Trashformer Part 1</span>
          </div>
        </div>
      </div>
      <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('dokum/trashformerpart1-2.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 9" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Trashformer Part 1</span>
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
          <img src="{{ asset('dokum/trashformerpart1-2.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 9" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Trashformer Part 1</span>
          </div>
        </div>
      </div>
     <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('dokum/trashformerpart1-3.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 10" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Trashformer Part 1</span>
          </div>
        </div>
      </div>
     <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('dokum/trashformerpart2-1.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 11" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Trashformer Part 2</span>
          </div>
        </div>
      </div>
     <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('dokum/trashformerpart2-2.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 12" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Trashformer Part 2</span>
          </div>
        </div>
      </div>
     <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('dokum/trashformerpart2-3.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 13" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Trashformer Part 2</span>
          </div>
        </div>
      </div>
     <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('dokum/trashformerpart1-2.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 14" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Trashformer Part 1</span>
          </div>
        </div>
      </div>
     <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('dokum/trashformerpart1-3.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 15" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Trashformer Part 1</span>
          </div>
        </div>
      </div>
     <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('dokum/trashformerpart2-1.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 16" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Trashformer Part 2</span>
          </div>
        </div>
      </div>
       <div class="inline-block p-[1px]">
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
          <img src="{{ asset('dokum/trashformerpart2-2.JPG') }}" class="w-full h-full object-cover transition duration-300" alt="Foto 17" loading="lazy">
          <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
            <span class="text-white text-xs font-medium">Trashformer Part 2</span>
          </div>
        </div>
      </div>
    </div>
  </div>
 
</section>
<!-- section foto end -->

<!-- Section text start -->
<section class="w-full px-6 md:px-12 mb-10">
  <div class="max-w-full mx-auto text-left">
    <h1 class="text-xl md:text-7xl font-bold text-black leading-tight text-center">
      <!-- Change Begins with You(th)<br/> -->
      Building a <span class="text-palette-2">Greener World</span><br/>
      One Step at a Time.
    </h1>

    <p class="text-gray-400 font-light text-xs md:text-base mt-7 text-center">
      Green Generation empowers youth to <br>lead,
      innovate, and act for the environment.
    </p>
  </div>
</section>
<!-- Section text end -->

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
          <h3 class="text-xl font-bold text-gray-900" data-aos="fade-left">GG Beraksi</h3>
          <time class="block mb-4 text-sm text-gray-500" data-aos="fade-left">Released on Januari, 2025</time>
          <p class="mb-3 text-sm text-gray-600" data-aos="fade-left">Grow Action for Volunteer Engagement in Taman Absari Surabaya</p>

          <!-- foto -->
          <div class="flex items-start gap-4 mt-4">
            <a href="{{ asset('dokum/ggberaksi1.JPG') }}" target="_blank">
              <img src="{{ asset('dokum/ggberaksi1.JPG') }}" 
                  class="rounded-3xl w-56 max-w-sm" 
                  loading="lazy"
                  alt="GG Beraksi" 
                  data-aos="fade-left"
                  data-aos-delay="0"
                  data-aos-duration="800"
                  >
            </a>

            <div class="hidden sm:flex flex-row gap-4">
              <a href="{{ asset('dokum/ggberaksi3.JPG') }}" target="_blank">
                <img src="{{ asset('dokum/ggberaksi3.JPG') }}" 
                    loading="lazy"
                    class="rounded-3xl w-56 max-w-sm" 
                    alt="GG Beraksi 2" 
                    data-aos="fade-left"
                    data-aos-delay="500"
                    data-aos-duration="800"
                >
              </a>
              <a href="{{ asset('dokum/ggberaksi4.JPG') }}" target="_blank">
                <img src="{{ asset('dokum/ggberaksi4.JPG') }}" 
                    loading="lazy"
                    class="rounded-3xl w-56 max-w-sm" 
                    alt="GG Beraksi 3" 
                    data-aos="fade-left"
                    data-aos-delay="1000"
                    data-aos-duration="800"
                >
              </a>
            </div>
          </div>
        </li>

        <!-- journey 2 -->
        <li class="mb-12 ms-6">
          <span class="absolute flex items-center justify-center w-6 h-6 bg-palette-1 rounded-full -start-3 ring-8 ring-white">
            <svg class="w-2.5 h-2.5 text-palette-5" fill="currentColor" viewBox="0 0 20 20">
              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
            </svg>
          </span>
          <h3 class="text-xl font-bold text-gray-900" data-aos="fade-left" >Trashformer</h3>
          <time class="block mb-4 text-sm text-gray-500" data-aos="fade-left">Released on Februari, 2025</time>
          <p class="mb-3 text-sm text-gray-600" data-aos="fade-left">An environmental movement to transform waste into something more meaningful.</p>

          <!-- foto -->
          <div class="flex items-start gap-4 mt-4">
            
              <a href="{{ asset('dokum/trashformerpart1-1.JPG') }}" target="_blank">
                <img src="{{ asset('dokum/trashformerpart1-1.JPG') }}" 
                    loading="lazy"
                    class="rounded-3xl w-56 max-w-sm" 
                    alt="trashformer" 
                    data-aos="fade-left"
                    data-aos-delay="0"
                    data-aos-duration="800"
                  >
              </a>

              <div class="hidden sm:flex flex-row gap-4">
              <a href="{{ asset('dokum/trashformerpart2-1.JPG') }}" target="_blank">
                  <img src="{{ asset('dokum/trashformerpart2-1.JPG') }}" 
                      class="rounded-3xl w-56 max-w-sm" 
                      loading="lazy"
                      alt="trashformer 2" 
                      data-aos="fade-left"
                      data-aos-delay="500"
                      data-aos-duration="800"
                  >
              </a>
                      
              <a href="{{ asset('dokum/trashformerpart2-2.JPG') }}" target="_blank">
                  <img src="{{ asset('dokum/trashformerpart2-2.JPG') }}" 
                      class="rounded-3xl w-56 max-w-sm" 
                      loading="lazy"
                      alt="trashformer 3" 
                      data-aos="fade-left"
                      data-aos-delay="1000"
                      data-aos-duration="800"
                  >
              </a>
            </div>
          </div>
        </li>
        
         <!-- journey 3 -->
         <li class="mb-12 ms-6">
            <span class="absolute flex items-center justify-center w-6 h-6 bg-palette-1 rounded-full -start-3 ring-8 ring-white">
              <svg class="w-2.5 h-2.5 text-palette-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
              </svg>
            </span>
            <h3 class="text-xl font-semibold text-gray-900" data-aos="fade-left">Growave</h3>
            <time class="block mb-4 text-sm text-gray-500" data-aos="fade-left">Released on Juni, 2025</time>
            <p class="mb-3 text-sm text-gray-600" data-aos="fade-left">Volunteer Engagement in Mangrove Planting</p>

            <!-- foto -->
            <div class="flex items-start gap-4 mt-4">
              
                <a href="{{ asset('dokum/growave1.JPG') }}" target="_blank">
                  <img src="{{ asset('dokum/growave1.JPG') }}" 
                      class="rounded-3xl w-56 max-w-sm" 
                      loading="lazy"
                      alt="Growave1" 
                      data-aos="fade-left"
                      data-aos-delay="0"
                      data-aos-duration="800"
                    >
                </a>

                <div class="hidden sm:flex flex-row gap-4">

                <a href="{{ asset('dokum/growave2.JPG') }}" target="_blank">
                    <img src="{{ asset('dokum/growave2.JPG') }}" 
                        class="rounded-3xl w-56 max-w-sm"
                        loading="lazy" 
                        alt="Growave2" 
                        data-aos="fade-left"
                        data-aos-delay="500"
                        data-aos-duration="800"
                      >
                </a>

                <a href="{{ asset('dokum/growave3.JPG') }}" target="_blank">
                    <img src="{{ asset('dokum/growave3.JPG') }}" 
                        class="rounded-3xl w-56 max-w-sm" 
                        loading="lazy"
                        alt="Growave3" 
                        data-aos="fade-left"
                        data-aos-delay="1000"
                        data-aos-duration="800"
                        >
                  </a>
              </div>
            </div>
          </li>   

          <!-- journey 4 -->
          <li class="mb-12 ms-6">
            <span class="absolute flex items-center justify-center w-6 h-6 bg-palette-1 rounded-full -start-3 ring-8 ring-white">
              <svg class="w-2.5 h-2.5 text-palette-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
              </svg>
            </span>
            <h3 class="text-xl font-semibold text-gray-900" data-aos="fade-left">Greenovation</h3>
            <time class="block mb-4 text-sm text-gray-500" data-aos="fade-left">Released on Juni, 2025</time>
            <p class="mb-3 text-sm text-gray-600" data-aos="fade-left">Grow Action for Volunteer Engagement in Mangrove Planting</p>

            <!-- foto -->
            <div class="flex items-start gap-4 mt-4">
              
              <a href="{{ asset('dokum/greenovation_batch1_2.JPG') }}" target="_blank">
                <img src="{{ asset('dokum/greenovation_batch1_2.JPG') }}" 
                    class="rounded-3xl w-56 max-w-sm"
                    loading="lazy" 
                    alt="Greenovation1" 
                    data-aos="fade-left"
                    data-aos-delay="0"
                    data-aos-duration="800"
                  >
              </a>

              <div class="hidden sm:flex flex-row gap-4">
              <a href="{{ asset('dokum/greenovation_batch1_1.JPG') }}" target="_blank">
                  <img src="{{ asset('dokum/greenovation_batch1_1.JPG') }}" 
                      class="rounded-3xl w-56 max-w-sm" 
                      loading="lazy"
                      alt="Greenovation2" 
                      data-aos="fade-left"
                      data-aos-delay="500"
                      data-aos-duration="800"
                      >
              </a>

              <a href="{{ asset('dokum/greenovation_batch3_3.JPG') }}" target="_blank">
                  <img src="{{ asset('dokum/greenovation_batch3_3.JPG') }}" 
                      class="rounded-3xl w-64 max-w-sm" 
                      loading="lazy"
                      alt="Greenovation3" 
                      data-aos="fade-left"
                      data-aos-delay="1000"
                      data-aos-duration="800"
                      >
              </a>
              </div>
            </div>
          </li>   
      </ol>
    </div>
  </div>
</section>
<!-- section timeline end -->

<!-- section principal and FaQ start -->
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
      <div class="border-b pb-4" x-data="{ open: false }">
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
      <div class="border-b pb-4" x-data="{ open: false }">
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

      <!-- accordion 3 -->
      <div class="border-b pb-4" x-data="{ open: false }">
        <button @click="open = !open" class="flex justify-between w-full text-left text-sm md:text-base font-medium text-gray-800">
          How do I know if my registration is successful?
          <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div x-show="open" x-transition class="mt-3 text-gray-600 text-sm">
          After you register, you will receive a confirmation email with further details.
        </div>
      </div>

    </div>

  </div>
</section>

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

@endsection