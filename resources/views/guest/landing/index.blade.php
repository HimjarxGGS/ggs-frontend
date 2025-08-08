@extends('guest.layouts.app')

@section('title', 'Home - Green Generation Surabaya')

@section('content')
<!-- start hero Section -->
<section class="w-full px-6 md:px-12 py-28">
  <div class="max-w-full mx-auto text-left ml-0 md:ml-28 mt-10">
    <h1 class="text-4xl md:text-8xl font-extralight text-black leading-tight ">
      Change Begins with You(th)<br/>
      Building a <span style="color: #82896E">Greener World</span><br/>
      One Step at a Time.
    </h1>

    <p class="text-gray-500 text-base md:text-lg mt-7">
      Green Generation empowers youth to lead,<br />
      innovate, and act for the environment.
    </p>

    <!-- button mobile -->
    <div class="mt-6 md:hidden">
      <button class="bg-palette-5 hover:bg-[#935d3d] text-white font-extralight py-2 px-5 rounded-xl transition duration-200 flex items-center gap-2">
        <span class="text-sm">View Event</span>
      </button>
    </div>
  </div>

  <!-- button Desktop -->
  <div class="hidden lg:flex items-center mt-6 ml-28">
    <button class="bg-palette-5 text-white font-normal py-2 px-20 rounded-xl flex items-center gap-2 ease-in-out transition duration-500 hover:shadow-lg hover:shadow-gray-600">
      <span>View Event</span>
    </button>
  </div>
</section>

<!-- end Hero Section -->

<!-- start Section -->
<section class="w-full px-10 md:px-24 py-16">
  <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-10">

    <!-- gambar kiri -->
    <div class="w-full lg:w-1/2">
      <img src="{{ asset('images/Image Hero Landing Page.png') }}" alt="kegiatan" class="w-full h-auto " />
    </div>

    <!-- box icon + text -->
    <div class="w-full lg:w-1/2 flex flex-wrap justify-center gap-8">
      
      <!-- box 1 -->
      <div class="flex flex-col items-center text-center">
        <img src="{{ asset('icons/Experience.png') }}" alt="icon" class="w-12 h-12 md:w-16 md:h-16 mb-2" />
        <h3 class="text-xl md:text-2xl font-bold text-palette-4 italic">100+</h3>
        <p class="text-sm md:text-base text-gray-700">Partner Organizations</p>
      </div>

      <!-- box 2 -->
      <div class="flex flex-col items-center text-center">
        <img src="{{ asset('icons/Partner Organizations.png') }}" alt="icon" class="w-12 h-12 md:w-16 md:h-16 mb-2" />
        <h3 class="text-xl md:text-2xl font-bold text-palette-4 italic">100,000+</h3>
        <p class="text-sm md:text-base text-gray-700">Experience Every Year</p>
      </div>

    </div>
  </div>
</section>

<!-- Section card BPH Start-->
<section>
  <section class="w-full py-10 overflow-x-auto px-10 md:px-6 scrollbar-hide">
    <div class="flex gap-6 w-max">

      <div class="flex flex-col md:flex-row bg-white rounded-3xl shadow-lg overflow-hidden w-[350px] md:w-[700px] ease-in-out transition duration-500 hover:shadow-lg hover:shadow-gray-600">
        <img src="{{ asset('images/dummyphoto.png') }}" alt="" class="w-full md:w-1/2 h-80 object-cover" />
          <div class="bg-palette-1 p-6 flex flex-col justify-center md:w-1/2">
            <span class="w-6 h-6 text-palette-3 mb-2 font-semibold font ts text-4xl">"</span>
              <p class="text-lg mb-3 text-white">
                The experience changed my perspective and helped me become more confident.
              </p>
            <p class="font-bold text-sm text-palette-4 pt-16">Nanda Aliefira </p>
            <p class="text-sm text-gray-500">Chairman Green Generation Surabaya</p>
      </div>
    </div>
    <div class="flex flex-col md:flex-row bg-white rounded-3xl shadow-lg overflow-hidden w-[350px] md:w-[700px] ease-in-out transition duration-500 hover:shadow-lg hover:shadow-gray-600">
        <img src="{{ asset('images/dummyphoto.png') }}" alt="" class="w-full md:w-1/2 h-80 object-cover" />
          <div class="bg-palette-1 p-6 flex flex-col justify-center md:w-1/2">
            <span class="w-6 h-6 text-palette-3 mb-2 font-semibold font ts text-4xl">"</span>
              <p class="text-lg mb-3 text-white">
                The experience changed my perspective and helped me become more confident.
              </p>
            <p class="font-bold text-sm text-palette-4 pt-16">Najma Mei </p>
            <p class="text-sm text-gray-500">Vice Chairman Green Generation Surabaya</p>
        </div>
    </div>
    <!-- <div class="flex flex-col md:flex-row bg-white rounded-3xl shadow-lg overflow-hidden w-[350px] md:w-[700px] ease-in-out transition duration-500 hover:shadow-lg hover:shadow-gray-600">
        <img src="" alt="" class="w-full md:w-1/2 h-80 object-cover" />
          <div class="bg-[#DDCBB7] p-6 flex flex-col justify-center md:w-1/2">
            <span class="w-6 h-6 text-[#264025] mb-2 font-semibold font ts text-4xl">"</span>
              <p class="text-lg mb-3 text-white">
                The experience changed my perspective and helped me become more confident.
              </p>
            <p class="font-bold text-sm text-[#82896E] pt-16"></p>
            <p class="text-sm text-gray-500"></p>
        </div>
    </div> -->
  </div>
</section>
<!-- Section card BPH end-->


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
      <!-- <img  src="" alt="" class="bg-gray-300 rounded-md h-20 flex items-center justify-center text-sm"/> -->
  </div>
</section>
<!-- Section our Partner end-->
@endsection