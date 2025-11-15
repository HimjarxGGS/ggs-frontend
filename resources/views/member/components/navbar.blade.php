<!-- components/layout-shell.blade.php -->
<header class="flex justify-center">
   <nav class="fixed left-1/2 -translate-x-1/2 w-[95%] max-w-7xl rounded-full px-14 py-3 flex items-center justify-between lg:px-20 z-[100] transition-all duration-300 mt-8">
        <!-- logo -->
       <div class="flex items-center">
            <a href="/">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="h-14 w-auto pt-2" />
            </a>
        </div>

        <!-- hamburger -->
        <div class="lg:hidden">
        <button id="hamburgerBtn" type="button" class="relative w-8 h-8 flex flex-col justify-between items-center p-1">
            <span class="block w-7 h-0.5 bg-gray-700 transition-all duration-300"></span>
            <span class="block w-7 h-0.5 bg-gray-700 transition-all duration-300"></span>
            <span class="block w-7 h-0.5 bg-gray-700 transition-all duration-300"></span>
        </button>
        </div>

        <!-- desktop menu -->
        <div class="hidden lg:flex flex-1 justify-center gap-x-10 items-center">
            <!-- <a href="/" class="nav-link text-gray-500 font-semibold hover:text-palette-5 transition-transform duration-300 transform hover:scale-[1.3]">Home</a> -->
            <a href="/dashboard-member" class="nav-link text-gray-500 font-semibold hover:text-palette-5 transition-transform duration-300 transform hover:scale-[1.3]">Dashboard</a>
            <a href="/riwayat-pendaftaran" class="nav-link text-gray-500 font-semibold hover:text-palette-5 transition-transform duration-300 transform hover:scale-[1.3]">History</a>
            <a href="/data-diri" class="nav-link text-gray-500 font-semibold hover:text-palette-5 transition-transform duration-300 transform hover:scale-[1.3]">Data Diri</a>
        </div>

        <div class="hidden lg:flex items-center">
            <form action="{{ route('logout') }}" method="POST">
             @csrf
              <button class="bg-palette-3 text-white font-bold py-2 px-10 rounded-full hover:bg-gray-500 transition duration-300">
                Logout
              </button>
             </form>
        </div>
    </nav>

    <!-- mobile menu -->
    <div id="mobileMenu" class="hidden lg:hidden top-[113px] w-[85%] left-1/2 -translate-x-1/2 rounded-3xl backdrop-blur-3xl shadow-md py-7 text-center z-[99] fixed">
        <!-- <a href="/" class="nav-link block py-4 text-gray-500 font-semibold hover:text-[#5e3929] transition duration-200">Home</a> -->
        <a href="/dashboard-member" class="nav-link block py-4 text-gray-500 font-semibold hover:text-[#5e3929] transition duration-200">Dashboard</a>
        <a href="/riwayat-pendaftaran" class="nav-link block py-4 text-gray-500 font-semibold hover:text-[#5e3929] transition duration-200">History</a>
        <a href="/data-diri" class="nav-link block py-4 text-gray-500 font-semibold hover:text-[#5e3929] transition duration-200">Data Diri</a>
        
        <div class="mt-6">
          <form action="{{ route('logout') }}" method="POST">
             @csrf
            <button class="w-72 bg-palette-3text-white font-bold py-2 rounded-3xl transition duration-200">
                logout
            </button>
          </form>
        </div>
    </div>
</header>


    
