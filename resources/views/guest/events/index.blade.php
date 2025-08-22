@extends('guest.layouts.app')

@section('title', 'Event - Green Generation Surabaya')

@section('content')
<section class="relative w-full h-[80vh] flex items-center justify-center ">
    <!-- background -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/eventlanding.png') }}" 
             alt="Event Background" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/40"></div>
    </div>

    <!-- text -->
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-2xl md:text-5xl font-semibold">
            Act Today, Sustain Tomorrow
        </h1>
        <p class="md:mt-2 text-sm md:text-2xl font-light">
            Bertindak Hari Ini, Menjaga Esok Hari.
        </p>
    </div>

    <!-- stats -->
    <div class="absolute bottom-[-50px] w-full flex justify-center">
    <div class="bg-white shadow-lg rounded-2xl px-12 md:px-24 py-4 flex gap-8">
        
        <!-- Item 1 -->
        <div class="flex items-center md:gap-10 gap-4">
            <!-- Icon pakai img -->
            <img src="{{ asset('icons/person.svg')}}" alt="Volunteer Icon" class="w-7 h-7 md:w-7 md:h-7 object-contain" />
            
            <!-- Text -->
            <div class="text-left">
                <h2 class="text-xl md:text-2xl font-bold text-palette-4">100+</h2>
                <p class="text-gray-600 text-xs md:text-xs">Volunteer</p>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="flex items-center md:gap-10 gap-4 pl-10 md:ml-10">
            <!-- Icon pakai img -->
            <img src="{{ asset('icons/events.svg')}}" alt="Event Icon" class="w-8 h-8 md:w-10 md:h-10 object-contain" />
            
            <!-- Text -->
            <div class="text-left">
                <h2 class="text-xl md:text-2xl font-bold text-palette-4">50+</h2>
                <p class="text-gray-600 text-xs md:text-xs">Event</p>
            </div>
        </div>
    </div>
</div>
</section>

<!-- upcoming event start -->
<section class="max-w-7xl mx-auto px-4 md:px-8 py-12 mt-16">
    <!-- heading -->
    <div class="text-center md:text-left mb-8">
        <h2 class="text-2xl md:text-3xl font-bold">Upcoming Event</h2>
        <p class="text-gray-500 text-xs md:text-sm pt-1">
            Event-event yang akan datang dari Green Generation Surabaya!
        </p>
    </div>

    <!-- cards -->
    <div class="flex flex-wrap justify-center gap-6">
        @for ($i = 0; $i < 2; $i++)
        <a href="" class="block group">
            <div class="bg-white rounded-3xl shadow-md overflow-hidden hover:shadow-lg hover:shadow-gray-600 ease-in-out transition duration-500">
                <div class="relative">
                    <!-- cover -->
                    <img src="{{ asset('images/gambar-event.png') }}" alt="Event Cover" class="w-full h-52 object-scale-down pt-10">
                    <!-- status -->
                    <span class="absolute top-7 left-7 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                        Active
                    </span>
                </div>
                <div class="p-4 space-y-2">
                    <!-- judul -->
                    <h3 class="text-lg font-semibold pt-10">Volunteer Greenovation Batch 2</h3>
                    <!-- default penerbit -->
                    <p class="text-gray-500 text-xs">Green Generation Surabaya</p>
                    <!-- tanggal event -->
                    <div class="flex items-center text-xs text-gray-400 gap-2">
                        <img src="{{ asset('icons/calender.svg') }}" alt="Calendar" class="w-4 h-4">
                        <span>12 Juli 2025</span>
                    </div>
                    <!-- deskripsi -->
                    <p class="text-xs text-gray-600 pb-14">
                        Mari edukasi seluruh warga Surabaya supaya bisa mengelola sampah secara efektif!
                    </p>
                </div>
            </div>
        </a>
        <!-- BACAAAA: nyalakan empty ini ketika sudah connect ke db okeee?? -->
        <!-- @ empty
        <p class="col-span-3 text-center text-gray-500 py-10">
            Belum ada event terbaru.
        </p> -->
        @endfor
    </div>

    <!-- button -->
    <div class="flex justify-center mt-8">
        <a href="" 
        class="bg-[#7B4B36] hover:bg-[#5e3929] text-white px-6 py-2 rounded-lg text-sm md:text-base transition duration-300">
            Event Lainnya
        </a>
    </div>
</section>
<!-- upcoming event end -->

<!-- succesfull event start -->
<section class="max-w-7xl mx-auto px-4 md:px-8 py-12">
    <!-- heading -->
    <div class="text-center md:text-right mb-8">
        <h2 class="text-2xl md:text-3xl font-bold">Succesfull Event</h2>
        <p class="text-gray-600 text-xs md:text-sm pt-1">
            Event-event sukses yang diadakan oleh Green Generation Surabaya
        </p>
    </div>

    <!-- cards -->
    <div class="flex flex-wrap justify-center gap-6">
        @for ($i = 0; $i < 2; $i++)
        <a href="" class="block group ">
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg hover:shadow-gray-600 ease-in-out transition duration-500">
                <div class="relative">
                    <!-- cover -->
                    <img src="{{ asset('images/gambar-event.png') }}" alt="Event Cover" class="w-full h-52 object-scale-down mt-10">
                    <!-- status -->
                    <span class="absolute top-7 left-7 bg-orange-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                        Finished
                    </span>
                </div>
                <div class="p-4 space-y-2">
                    <!-- judul -->
                    <h3 class="text-lg font-semibold">Volunteer Greenovation Batch 2</h3>
                    <!-- default penerbit -->
                    <p class="text-gray-500 text-xs">Green Generation Surabaya</p>
                    <!-- tanggal -->
                    <div class="flex items-center text-xs text-gray-500 gap-2">
                        <img src="{{ asset('icons/calender.svg') }}" alt="Calendar" class="w-4 h-4">
                        <span>12 Juli 2025</span>
                    </div>
                    <p class="text-xs text-gray-600 pb-14">
                        Mari edukasi seluruh warga Surabaya supaya bisa mengelola sampah secara efektif!
                    </p>
                </div>
            </div>
        </a>
        <!-- BACAAAA: nyalakan empty ini ketika sudah connect ke db okeee?? -->
        <!-- @ empty
        <p class="col-span-3 text-center text-gray-500 py-10">
            Belum ada event yang selesai.
        </p> -->
        @endfor
    </div>

    <!-- button -->
    <div class="flex justify-center mt-8">
        <a href="" 
        class="border border-palette-2 text-palette-2 hover:bg-palette-2 hover:text-white px-6 py-2 rounded-lg text-sm md:text-base transition duration-300">
            Event Lainnya
        </a>
    </div>
</section>
<!-- succesfull event end -->

<section class="bg-[#F5F5F9] py-12">
    <div class="max-w-7xl mx-auto px-4 md:px-8 text-center">
        <!-- Heading -->
        <h2 class="text-2xl md:text-3xl font-bold text-palette-2 mb-10">
            Dampak Green Generation Surabaya
        </h2>

        <!-- Cards -->
        <div class="flex flex-col md:flex-row items-center justify-center gap-6">
            <!-- Card 1 -->
            <div class="flex items-center justify-between bg-gray-200 rounded-2xl px-6 py-4 w-80 md:w-80">
                <div class="text-left">
                    <p class="text-xl md:text-2xl font-bold text-palette-2">1.000</p>
                    <p class="text-xs md:text-sm text-palette-4">Bibit Pohon Ditanam</p>
                </div>
                <img src="{{ asset('icons/tree.svg') }}" 
                     alt="Tree" 
                     class="w-8 h-8 md:w-10 md:h-10">
            </div>

            <!-- Card 2 -->
            <div class="flex items-center justify-between bg-gray-200 rounded-2xl px-6 py-4 w-80 md:w-80">
                <div class="text-left">
                    <p class="text-xl md:text-2xl font-bold text-palette-2">8.765 <span class="text-sm">kg</span></p>
                    <p class="text-xs md:text-sm text-palette-4">Sampah Dikelola</p>
                </div>
                <img src="{{ asset('icons/recycle.svg') }}" 
                     alt="Recycle" 
                     class="w-8 h-8 md:w-10 md:h-10">
            </div>
        </div>
    </div>
</section>

@endsection
