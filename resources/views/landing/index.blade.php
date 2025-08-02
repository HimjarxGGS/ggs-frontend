<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>
<body>
    
<header class="flex justify-center mt-8">
   <nav class="fixed left-1/2 -translate-x-1/2 w-[95%] max-w-7xl rounded-xl bg-[#F2F2F7] backdrop-blur-md shadow-md px-4 py-3 flex items-center justify-between lg:px-8 z-[100]" aria-label="Global">
        <!-- Logo -->
        <div class="flex items-center">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="h-14 w-auto" />
        </div>

        <!-- Hamburger -->
        <div class="lg:hidden">
            <button id="hamburgerBtn" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-700 hover:bg-gray-100 transition-colors duration-300">
                <span class="sr-only">Buka menu</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Desktop menu -->
        <div class="hidden lg:flex flex-1 justify-center gap-x-10 items-center">
            <a href="#home" class="nav-link text-black font-bold hover:text-[#5e3929] transition duration-200">Home</a>
            <a href="#aboutus" class="nav-link text-black font-bold hover:text-[#5e3929] transition duration-200">About us</a>
            <a href="#event" class="nav-link text-black font-bold hover:text-[#5e3929] transition duration-200">Event</a>
            <a href="#blog" class="nav-link text-black font-bold hover:text-[#5e3929] transition duration-200">Blog</a>
        </div>

        <div class="hidden lg:flex items-center">
            <button class="bg-[#7B4B36] hover:bg-[#5e3929] text-white font-light py-2 px-4 rounded-xl transition duration-300">
                Daftar Member
            </button>
        </div>
    </nav>

    <!-- Mobile menu -->
    <div id="mobileMenu" class="hidden lg:hidden absolute top-[90px] w-[90%] left-1/2 -translate-x-1/2 rounded-md bg-[#F2F2F7] backdrop-blur-3xl shadow-md py-7 text-center z-[99]">
        <a href="#home" class="nav-link block py-4 text-black font-bold hover:text-[#5e3929] transition duration-200">Home</a>
        <a href="#aboutus" class="nav-link block py-4 text-black font-bold hover:text-[#5e3929] transition duration-200">About us</a>
        <a href="#event" class="nav-link block py-4 text-black font-bold hover:text-[#5e3929] transition duration-200">Event</a>
        <a href="#blog" class="nav-link block py-4 text-black font-bold hover:text-[#5e3929] transition duration-200">Blog</a>
        
        <div class="mt-6 px-6">
            <button class="w-80 bg-[#7B4B36] hover:bg-[#5e3929] text-white font-light py-2 px-4 rounded-xl transition duration-200">
                Daftar Member
            </button>
        </div>
    </div>
</header>

<!-- start Hero Section -->

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

    <!-- button Mobile -->
    <div class="mt-6 md:hidden">
      <button class="bg-[#AD6B4B] hover:bg-[#935d3d] text-white font-extralight py-2 px-5 rounded-xl transition duration-200 flex items-center gap-2">
        <span class="text-sm">View Event</span>
      </button>
    </div>
  </div>

  <!-- button Desktop -->
  <div class="hidden lg:flex items-center mt-6 ml-28">
    <button class="bg-[#AD6B4B] text-white font-normal py-2 px-20 rounded-xl flex items-center gap-2 ease-in-out transition duration-500 hover:shadow-lg hover:shadow-gray-600">
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
        <h3 class="text-xl md:text-2xl font-bold text-black italic">100+</h3>
        <p class="text-sm md:text-base text-gray-700">Partner Organizations</p>
      </div>

      <!-- box 2 -->
      <div class="flex flex-col items-center text-center">
        <img src="{{ asset('icons/Partner Organizations.png') }}" alt="icon" class="w-12 h-12 md:w-16 md:h-16 mb-2" />
        <h3 class="text-xl md:text-2xl font-bold text-black italic">100,000+</h3>
        <p class="text-sm md:text-base text-gray-700">Experience Every Year</p>
      </div>

    </div>
  </div>
</section>

</body>
</html>
