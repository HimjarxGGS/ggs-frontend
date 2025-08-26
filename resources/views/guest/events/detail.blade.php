@extends('guest.layouts.app')

@section('title', 'Detail Event - Green Generation Surabaya')

@section('content')
<div class="max-w-6xl mx-auto px-4 mt-40">

    <!-- section header start -->
    <section class="mb-8 text-left md:text-left md:pl-10 pl-3">
        <!-- judul -->
        <h1 class="text-xl md:text-3xl font-bold text-gray-800">
            <!-- tinggal ganti title -->
            Volunteer Greenovation Batch 2
        </h1>

        <!-- penerbit (default) -->
        <p class="text-gray-600 text-sm md:text-base">Green Generation Surabaya</p>

        <!-- status -->
        <!-- pake if else buat ngerubah status + warna e, kalau finished warna bg-orange-500 -->
        <span class="inline-block mt-3 bg-green-500 text-white text-xs md:text-sm font-semibold px-10 py-1 rounded-full">
            Active
        </span>
    </section>
    <!-- section header end -->

    <!-- section detail start -->
    <section class="my-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">

            <!-- poster event -->
            <div>
                <img src="{{ asset('images/posterggs.png') }}" 
                    alt="Poster Event" 
                    class="w-full h-auto max-h-[600px] object-contain">
            </div>

            <!-- detail event -->
            <div class="space-y-4">

                <!-- jadwal dan lokasi -->
                <div class="p-7 border rounded-xl shadow-md bg-white">
                    <div class="flex items-center">
                        <span class="w-5 h-5 mr-1 pt-0.5">
                            <img src="{{ asset('icons/calender.svg') }}" alt="icon">
                        </span>
                        <h3 class="font-normal text-gray-700">Jadwal Event</h3>
                    </div>
                    <p class="text-lg text-palette-2 font-semibold pl-6">12 Juli 2025, 05:30 - 11:00</p>
                    
                    <div class="flex items-center mt-4">
                        <span class="w-5 h-5 mr-1 pt-0.5">
                            <img src="{{ asset('icons/location.svg') }}" alt="icon"> 
                        </span>
                        <h3 class="font-normal text-gray-700">Lokasi</h3>
                    </div>
                    <p class="text-lg text-palette-2 font-semibold pl-6">Pantai Kenjeran</p>
                </div>

                <!-- deskripsi -->
                <div class="p-7 border rounded-xl shadow-md bg-white">
                    <div class="flex items-center mb-2">
                        <span class="w-5 h-5 mr-1 pt-0.5">
                            <img src="{{ asset('icons/desc.svg') }}" alt="icon"> 
                        </span>
                        <h3 class="font-normal text-gray-700">Deskripsi</h3>
                    </div>
                    <p class="text-sm font-semibold text-palette-2 leading-relaxed pl-6">
                        Mari edukasi seluruh warga Surabaya supaya bisa menerapkan pengolahan sampah yang efektif!  
                        Jangan sampai kelewatan, segera daftarkan diri dan berkontribusi!
                    </p>
                </div>

                <!-- button cta -->
            <div class="p-4 border rounded-xl shadow-md bg-white">
                    <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-3">
                        <a href="https://wa.me/628123456789"
                        class="inline-flex items-center justify-center rounded-full bg-gray-200 text-gray-800 hover:bg-gray-300 px-7 py-3 md:px-20 md:py-2 text-sm md:text-base transition duration-300 font-medium">
                        Contact Person
                        </a>

                        <a href="" 
                        class="inline-flex items-center justify-center rounded-full bg-palette-5 text-white font-semibold hover:bg-brown-600 px-12 py-3 md:px-20 md:py-2 text-sm md:text-base transition duration-300">
                        Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section detail end -->

    <!-- section dokumentasi start -->
    <!-- note: dokumentasi hanya muncul jika event sudah berstatus finished, section ini ga perlu di hide meski event masih aktif, nanti pake aja @ empty lalu dikasih teks: Dokumentasi akan muncul ketika event telah selesai -->
    <section>
        <div class="max-w-6xl mx-auto px-4">
            <!-- title -->
            <h2 class="text-xl md:text-2xl font-semibold mb-5 text-left md:text-left md:pl-7">
                Dokumentasi
            </h2>

            <!-- Wrapper -->
            <div class="overflow-x-auto md:overflow-x-visible scrollbar-hide">
                <div class="flex space-x-4 pb-4 min-w-max justify-start md:justify-center">
                    @for ($i = 0; $i < 4; $i++)
                        <a href="{{ asset('images/imageggs.png') }}" target="_blank">
                            <img src="{{ asset('images/imageggs.png') }}" 
                                alt="Dokumentasi {{ $i+1 }}"
                                class="w-[250px] h-[150px] rounded-xl object-cover shadow-lg flex-shrink-0 cursor-pointer hover:opacity-90 transition">
                        </a>
                    @endfor
                </div>
            </div>
        </div>
    </section>
    <!-- section dokumentasi end -->

    <!-- section more event start -->
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            <!-- title -->
            <h2 class="text-xl md:text-2xl font-semibold mb-5 text-left md:text-left md:pl-7">
                More Event
            </h2>

            <!-- Wrapper -->
            <div class="flex space-x-4 overflow-x-auto pb-4 scrollbar-hide sm:grid sm:grid-cols-2 lg:grid-cols-3 sm:gap-3 sm:justify-items-center">
                @for ($i = 0; $i < 3; $i++)
                    <a href="" class="group flex-shrink-0 sm:flex-shrink">
                        <div class="bg-white rounded-3xl shadow-md overflow-hidden hover:shadow-lg hover:shadow-gray-600 ease-in-out transition duration-500 w-72 sm:w-auto">

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
                @endfor
            </div>
        </div>
    </section>
    <!-- section more event end -->


</div>


@endsection
