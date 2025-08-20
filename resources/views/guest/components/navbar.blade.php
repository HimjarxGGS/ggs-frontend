<!-- components/layout-shell.blade.php -->
<header class="flex justify-center mt-8">
   <nav class="fixed left-1/2 -translate-x-1/2 w-[95%] max-w-7xl rounded-xl px-4 py-3 flex items-center justify-between lg:px-8 z-[100] transition-all duration-300">
        <!-- logo -->
        <div class="flex items-center">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="h-14 w-auto" />
        </div>

        <!-- hamburger -->
        <div class="lg:hidden">
            <button id="hamburgerBtn" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-700 hover:bg-gray-100 transition-colors duration-300">
                <span class="sr-only">Buka menu</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- desktop menu -->
        <div class="hidden lg:flex flex-1 justify-center gap-x-10 items-center">
            <a href="/home" class="nav-link text-black font-bold hover:text-[#5e3929] transition duration-200">Home</a>
            <a href="/about" class="nav-link text-black font-bold hover:text-[#5e3929] transition duration-200">About us</a>
            <a href="/event" class="nav-link text-black font-bold hover:text-[#5e3929] transition duration-200">Event</a>
            <a href="/blog" class="nav-link text-black font-bold hover:text-[#5e3929] transition duration-200">Blog</a>
        </div>

        <div class="hidden lg:flex items-center">
            <a href="/login">
              <button class="bg-[#7B4B36] hover:bg-[#5e3929] text-white font-light py-2 px-10 rounded-lg transition duration-300">
                Sign in
              </button>
            </a>
        </div>
    </nav>

    <!-- mobile menu -->
    <div id="mobileMenu" class="hidden lg:hidden top-[110px] w-[90%] left-1/2 -translate-x-1/2 rounded-md bg-[#F2F2F7] backdrop-blur-3xl shadow-md py-7 text-center z-[99] fixed">
        <a href="/home" class="nav-link block py-4 text-black font-bold hover:text-[#5e3929] transition duration-200">Home</a>
        <a href="/aboutus" class="nav-link block py-4 text-black font-bold hover:text-[#5e3929] transition duration-200">About us</a>
        <a href="/event" class="nav-link block py-4 text-black font-bold hover:text-[#5e3929] transition duration-200">Event</a>
        <a href="/blog" class="nav-link block py-4 text-black font-bold hover:text-[#5e3929] transition duration-200">Blog</a>
        
        <div class="mt-6 px-6">
          <a href="">
            <button class="w-80 bg-[#7B4B36] hover:bg-[#5e3929] text-white font-light py-2 px-4 rounded-xl transition duration-200">
                Daftar Member
            </button>
          </a>
        </div>
    </div>
</header>
