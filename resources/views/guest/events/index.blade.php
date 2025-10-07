@extends('guest.layouts.app')

@section('title', 'Event - Green Generation Surabaya')

@section('content')
<section class="relative w-full h-[80vh] flex items-center justify-center font-geist">
    <!-- background -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/eventlanding.png') }}"
            alt="Event Background"
            class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/40"></div>
    </div>

    <!-- text -->
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-2xl md:text-6xl font-semibold">
            Act Today, Sustain Tomorrow
        </h1>
        <div class="text-center">
            <p class="md:mt-2 text-sm md:text-2xl font-light inline-block overflow-hidden whitespace-nowrap animate-typewriter">
                Bertindak Hari Ini, Menjaga Esok Hari.
            </p>
        </div>
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
                    <h2 id="volunteerCount" class="text-xl md:text-2xl font-bold text-palette-4" data-target="100">0</h2>
                    <p class="text-gray-600 text-xs md:text-xs">Volunteer</p>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="flex items-center md:gap-10 gap-4 pl-10 md:ml-10">
                <!-- Icon pakai img -->
                <img src="{{ asset('icons/events.svg')}}" alt="Event Icon" class="w-8 h-8 md:w-10 md:h-10 object-contain" />

                <!-- Text -->
                <div class="text-left">
                    <h2 id="eventCount" class="text-xl md:text-2xl font-bold text-palette-4" data-target="50">0</h2>
                    <p class="text-gray-600 text-xs md:text-xs">Event</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- upcoming event start -->
<div class="flex justify-items-center max-w-7xl mx-auto">
    <div class="mt-32 mb-12 px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($upcoming as $i => $event)
        <a href="{{ route('events.show', $event->id) }}"
            class="block group {{ $i >= 1 ? 'hidden sm:block' : '' }}">
            <div class="bg-white rounded-3xl shadow-md overflow-hidden hover:shadow-lg hover:shadow-gray-600 ease-in-out transition duration-500 flex flex-col h-full">
                <div class="relative">
                    <img src="{{ $event->poster ? asset('storage/'.$event->poster) : asset('images/gambar-event.png') }}"
                        alt="Event Cover"
                        class="w-full h-52 object-cover">

                    <span class="absolute top-7 left-7 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                        {{ ucfirst($event->status) }}
                    </span>
                </div>
                <div class="p-4 flex flex-col justify-between flex-1">
                    <div class="space-y-2">
                        <!-- judul -->
                        <h3 class="text-lg font-semibold line-clamp-2">{{ $event->name }}</h3>
                        <!-- default penerbit -->
                        <p class="text-gray-500 text-xs">Green Generation Surabaya</p>
                        <!-- tanggal event -->
                        <div class="flex items-center text-xs text-gray-400 gap-2">
                            <img src="{{ asset('icons/calender.svg') }}" alt="Calendar" class="w-4 h-4">
                            <span>{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}</span>
                        </div>
                        <!-- deskripsi -->
                        <p class="text-xs text-wrap text-gray-600 line-clamp-3">
                            {!! Str::limit($event->description, 100) !!}
                        </p>
                    </div>
                </div>
            </div>
        </a>
        @empty
        <p class="col-span-3 text-center text-gray-500 py-10">
            Belum ada event terbaru.
        </p>
        @endforelse
    </div>
</div>


<div class="text-center mt-6">
    <a href="{{ route('events.upcoming') }}"
        class="inline-block bg-palette-2 text-white px-6 py-2 rounded-xl 
              hover:bg-palette-3 transition ease-in-out duration-300 hover:shadow-lg">
        Lihat Semua Upcoming Event
    </a>
</div>
<!-- upcoming event end -->

<!-- succesfull event start -->
<div class="max-w-7xl mx-auto mt-14 mb-12 px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-items-center">
    @forelse ($finished as $i => $event)
    <a href="{{ route('events.show', $event->id) }}"
        class="block group {{ $i >= 1 ? 'hidden sm:block' : '' }}">
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg hover:shadow-gray-600 ease-in-out transition duration-500">
            <div class="relative">
                <img src="{{ $event->poster ? asset('storage/'.$event->poster) : asset('images/gambar-event.png') }}"
                    alt="Event Cover"
                    class="w-full h-52 object-cover">
                <span class="absolute top-7 left-7 bg-orange-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                    Finished
                </span>
            </div>
            <div class="p-4 space-y-2">
                <h3 class="text-lg font-semibold">{{ $event->name }}</h3>
                <p class="text-gray-500 text-xs">Green Generation Surabaya</p>
                <div class="flex items-center text-xs text-gray-500 gap-2">
                    <img src="{{ asset('icons/calender.svg') }}" alt="Calendar" class="w-4 h-4">
                    <span>{{ $event->event_date->translatedFormat('d F Y') }}</span>
                </div>
                <p class="text-xs text-wrap text-gray-600 pb-14">
                    {{ Str::limit($event->description, 100) }}
                </p>
            </div>
        </div>
    </a>
    @empty
    <p class="col-span-3 text-center text-gray-500 py-10">
        Belum ada event yang selesai.
    </p>
    @endforelse
</div>

<div class="text-center mt-6">
    <a href="{{ route('events.finished') }}"
        class="inline-block bg-palette-2 text-white px-6 py-2 rounded-xl 
              hover:bg-palette-3 transition ease-in-out duration-300 hover:shadow-lg">
        Lihat Semua Successful Event
    </a>
</div>
<!-- succesfull event end -->

<!-- start section dampak -->
<section class="bg-[#F5F5F9] py-12 mt-10">
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
                    <p class="text-xl md:text-2xl font-bold text-palette-2" id="dampak1" data-target="50">0</p>
                    <p class="text-xs md:text-sm text-palette-4">Bibit Pohon Ditanam</p>
                </div>
                <img src="{{ asset('icons/tree.svg') }}"
                    alt="Tree"
                    class="w-8 h-8 md:w-10 md:h-10">
            </div>

            <!-- Card 2 -->
            <div class="flex items-center justify-between bg-gray-200 rounded-2xl px-6 py-4 w-80 md:w-80">
                <div class="text-left">
                    <div class="flex">
                        <h2 class="text-xl md:text-2xl font-bold text-palette-2" id="dampak2" data-target="5000">0</h2>
                        <span class="text-sm ml-1 pt-2">kg</span>
                    </div>
                    <p class="text-xs md:text-sm text-palette-4">Sampah Dikelola</p>
                </div>

                <img src="{{ asset('icons/recycle.svg') }}"
                    alt="Recycle"
                    class="w-8 h-8 md:w-10 md:h-10">
            </div>
        </div>
    </div>
</section>
<!-- end section dampak -->

<!-- section testimoni start -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-8 md:mx-10 lg:mx-20 xl:mx-auto">

        <!-- header -->
        <div class="transition duration-500 ease-in-out transform scale-100 translate-x-0 translate-y-0 opacity-100">
            <div class="mb-12 md:mb-16 md:text-center">
                <div
                    class="inline-block px-5 py-1 text-sm font-semibold text-white rounded-full md:text-center bg-[#202c47] bg-opacity-60 hover:cursor-pointer hover:bg-opacity-40 transition duration-300">
                    Testimoni
                </div>
                <h1 class="text-3xl font-semibold text-black md:text-center md:text-4xl mt-3">
                    Green Generation Surabaya
                </h1>
                <p class="text-base text-gray-500 md:text-center md:text-lg mt-3">
                    Pengalaman dan testimoni mereka yang tumbuh bersama GGSBY untuk menjaga lingkungan.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
            <!-- line 1 -->
            <ul class="space-y-8">
                <li class="text-sm leading-6">
                    <div class="relative group" data-aos="zoom-in-right">
                        <div
                            class="absolute transition rounded-3xl opacity-25 -inset-1 bg-gradient-to-r from-palette-4 to-palette-2 blur duration-400 group-hover:opacity-100 group-hover:duration-500">
                        </div>
                        <div class="relative p-6 space-y-6 leading-none rounded-3xl bg-white ring-1 ring-gray-200">
                            <div class="flex items-center space-x-4">
                                <img
                                    src="https://pbs.twimg.com/profile_images/1276461929934942210/cqNhNk6v_400x400.jpg"
                                    class="w-12 h-12 bg-center bg-cover border rounded-full"
                                    alt="Kanye West">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">Ayu Lestari</h3>
                                    <p class="text-palette-4 text-md">Koordinator lingkungan</p>
                                </div>
                            </div>
                            <p class="leading-normal text-gray-700 text-md"> Program penghijauan ini membuat lingkungan terasa lebih segar dan nyaman. Saya bangga bisa ikut berkontribusi menanam pohon bersama. </p>
                        </div>
                    </div>
                </li>

                <li class="text-sm leading-6">
                    <div class="relative group" data-aos="zoom-in" data-aos-delay="200">
                        <div
                            class="absolute transition rounded-3xl opacity-25 -inset-1 bg-gradient-to-r from-palette-4 to-palette-2 blur duration-400 group-hover:opacity-100 group-hover:duration-500">
                        </div>
                        <div
                            class="relative p-6 space-y-6 leading-none rounded-3xl bg-white ring-1 ring-gray-200">
                            <div class="flex items-center space-x-4"><img
                                    src="https://pbs.twimg.com/profile_images/1535420431766671360/Pwq-1eJc_400x400.jpg"
                                    class="w-12 h-12 bg-center bg-cover border rounded-full" alt="Tim Cook">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">Tim Cook</h3>
                                    <p class="text-palette-4 text-md">CEO of Apple</p>
                                </div>
                            </div>
                            <p class="leading-normal text-gray-700 text-md">Diam quis enim lobortis scelerisque
                                fermentum dui faucibus in ornare. Donec pretium vulputate sapien nec sagittis
                                aliquam malesuada bibendum.</p>
                        </div>
                    </div>
                </li>

                <li class="text-sm leading-6 block md:hidden">
                    <div class="relative group" data-aos="zoom-in-right" data-aos-delay="400">
                        <div
                            class="absolute transition rounded-lg opacity-25 -inset-1 bg-gradient-to-r from-palette-4 to-palette-2 blur duration-400 group-hover:opacity-100 group-hover:duration-500">
                        </div><a href="https://twitter.com/tim_cook" class="cursor-pointer">
                            <div
                                class="relative p-6 space-y-6 leading-none rounded-lg bg-white ring-1 ring-gray-200">
                                <div class="flex items-center space-x-4"><img
                                        src="https://pbs.twimg.com/profile_images/1535420431766671360/Pwq-1eJc_400x400.jpg"
                                        class="w-12 h-12 bg-center bg-cover border rounded-full" alt="Tim Cook">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800">Tim Cook</h3>
                                        <p class="text-palette-4 text-md">CEO of Apple</p>
                                    </div>
                                </div>
                                <p class="leading-normal text-gray-700 text-md">Diam quis enim lobortis scelerisque
                                    fermentum dui faucibus in ornare. Donec pretium vulputate sapien nec sagittis
                                    aliquam malesuada bibendum.</p>
                            </div>
                        </a>
                    </div>
                </li>
            </ul>

            <!-- line 2 -->
            <ul class="hidden space-y-8 sm:block">
                <li class="text-sm leading-6">
                    <div class="relative group" data-aos="zoom-in" data-aos-delay="200">
                        <div
                            class="absolute transition rounded-3xl opacity-25 -inset-1 bg-gradient-to-r from-palette-4 to-palette-2 blur duration-400 group-hover:opacity-100 group-hover:duration-500">
                        </div>
                        <div
                            class="relative p-6 space-y-6 leading-none rounded-3xl bg-white ring-1 ring-gray-200">
                            <div class="flex items-center space-x-4"><img
                                    src="https://pbs.twimg.com/profile_images/1375285353146327052/y6jeByyD_400x400.jpg"
                                    class="w-12 h-12 bg-center bg-cover border rounded-full" alt="Parag Agrawal">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">Parag Agrawal</h3>
                                    <p class="text-palette-4 text-md">CEO of Twitter</p>
                                </div>
                            </div>
                            <p class="leading-normal text-gray-700 text-md">Enim neque volutpat ac tincidunt vitae
                                semper. Mattis aliquam faucibus purus in massa tempor. Neque vitae tempus quam
                                pellentesque nec. Turpis cursus in hac habitasse platea dictumst.</p>
                        </div>
                    </div>
                </li>
                <li class="text-sm leading-6">
                    <div class="relative group" data-aos="zoom-in" data-aos-delay="300">
                        <div
                            class="absolute transition rounded-3xl opacity-25 -inset-1 bg-gradient-to-r from-palette-4 to-palette-2 blur duration-400 group-hover:opacity-100 group-hover:duration-500">
                        </div>
                        <div
                            class="relative p-6 space-y-6 leading-none rounded-3xl bg-white ring-1 ring-gray-200">
                            <div class="flex items-center space-x-4"><img
                                    src="https://pbs.twimg.com/profile_images/1375285353146327052/y6jeByyD_400x400.jpg"
                                    class="w-12 h-12 bg-center bg-cover border rounded-full" alt="Parag Agrawal">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">Parag Agrawal</h3>
                                    <p class="text-palette-4 text-md">CEO of Twitter</p>
                                </div>
                            </div>
                            <p class="leading-normal text-gray-700 text-md">Enim neque volutpat ac tincidunt vitae
                                semper. Mattis aliquam faucibus purus in massa tempor. Neque vitae tempus quam
                                pellentesque nec. Turpis cursus in hac habitasse platea dictumst.</p>
                        </div>
                    </div>
                </li>
            </ul>

            <!-- line 3 -->
            <ul class="hidden space-y-8 lg:block">
                <li class="text-sm leading-6">
                    <div class="relative group" data-aos="zoom-in-left" data-aos-delay="250">
                        <div
                            class="absolute transition rounded-3xl opacity-25 -inset-1 bg-gradient-to-r from-palette-4 to-palette-2 blur duration-400 group-hover:opacity-100 group-hover:duration-500">
                        </div>
                        <div
                            class="relative p-6 space-y-6 leading-none rounded-3xl bg-white ring-1 ring-gray-200">
                            <div class="flex items-center space-x-4"><img
                                    src="https://pbs.twimg.com/profile_images/1221837516816306177/_Ld4un5A_400x400.jpg"
                                    class="w-12 h-12 bg-center bg-cover border rounded-full" alt="Satya Nadella">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">Satya Nadella</h3>
                                    <p class="text-palette-4 text-md">CEO of Microsoft</p>
                                </div>
                            </div>
                            <p class="leading-normal text-gray-700 text-md">Tortor dignissim convallis aenean et.</p>
                        </div>
                    </div>
                </li>
                <li class="text-sm leading-6">
                    <div class="relative group" data-aos="zoom-in-left" data-aos-delay="350">
                        <div
                            class="absolute transition rounded-3xl opacity-25 -inset-1 bg-gradient-to-r from-palette-4 to-palette-2 blur duration-400 group-hover:opacity-100 group-hover:duration-500">
                        </div>
                        <div
                            class="relative p-6 space-y-6 leading-none rounded-3xl bg-white ring-1 ring-gray-200">
                            <div class="flex items-center space-x-4"><img
                                    src="https://pbs.twimg.com/profile_images/1221837516816306177/_Ld4un5A_400x400.jpg"
                                    class="w-12 h-12 bg-center bg-cover border rounded-full" alt="Satya Nadella">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">Satya Nadella</h3>
                                    <p class="text-palette-4 text-md">CEO of Microsoft</p>
                                </div>
                            </div>
                            <p class="leading-normal text-gray-700 text-md">Tortor dignissim convallis aenean et.</p>
                        </div>
                    </div>
                </li>
        </div>
    </div>
</section>
<!-- section testimoni end -->

@endsection