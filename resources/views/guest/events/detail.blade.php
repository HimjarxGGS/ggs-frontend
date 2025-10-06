@extends('guest.layouts.app')

@section('title', 'Detail Event - ' . $event->name)

@section('content')
<div class="max-w-6xl mx-auto px-4 mt-40 font-geist">

    <!-- header -->
    <div class="mb-8 text-center md:text-left">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
            {{ $event->name }}
        </h1>
        <p class="text-gray-600 text-sm md:text-base">Green Generation Surabaya</p>

        <span class="inline-block mt-3 text-xs md:text-sm font-semibold px-10 py-1 rounded-full
            {{ ($event->status == 'upcoming' ? 'bg-orange-500 text-white' : 'bg-green-500 text-white') }}">
            {{ ucfirst($event->status) }}
        </span>
    </div>

    <!-- poster & detail -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">

        <!-- poster -->
        <div>
            <img src="{{ $event->poster ? asset('storage/'.$event->poster) : asset('images/posterggs.png') }}"
                alt="Poster Event"
                class="w-full h-auto max-h-[600px] object-contain rounded-lg shadow-lg">

        </div>

        <div class="space-y-4">

            <!-- card 1, jadwal dan lokasi -->
            <div class="p-4 border rounded-xl shadow-md bg-white text-sm ring-1 ring-palette-1 space-y-3">
                <!-- jadwal -->
                <div class="flex items-center gap-3">
                    <img src="{{ asset('icons/calender.svg') }}" alt="Calendar" class="w-5 h-5">
                    <div>
                        <h3 class="text-gray-500">Jadwal Event</h3>
                        <p class="text-lg text-black font-semibold">
                            {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y, H:i') }}
                        </p>
                    </div>
                </div>

                <!-- lokasi -->
                <div class="flex items-center gap-3">
                    <img src="{{ asset('icons/location.svg') }}" alt="Location" class="w-5 h-5">
                    <div>
                        <h3 class="text-gray-500">Lokasi</h3>
                        <p class="text-lg text-black font-semibold">
                            {{ $event->location ?? 'Lokasi belum ditentukan' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- desc -->
            <div class="p-4 border rounded-xl shadow-md ring-palette-1 ring-1">
                <div class="flex items-start gap-3">
                    <img src="{{ asset('icons/desc.svg') }}" alt="Description" class="w-5 h-5 mt-1">
                    <div>
                        <h3 class="text-sm text-gray-500">Deskripsi</h3>

                        {!! $event->getEventDescription() !!}

                    </div>
                </div>
            </div>

            <!-- cta -->
            <div class="p-4 border rounded-xl shadow-md flex justify-center gap-4 mt-6">
                <!-- button daftar -->
                <a href="{{ $event->registration_link ?? '#' }}"
                    class="px-5 md:px-6 py-3 bg-palette-5 text-white rounded-2xl shadow-md hover:bg-gray-500 transition duration-300 ease-in-out md:text-lg text-sm">
                    Daftar Sekarang
                </a>
                <!-- button contact person -->
                <a href="https://wa.me/{{ $event->contact_person ?? '628123456789' }}"
                    class="px-5 md:px-6 py-3 border border-black text-black rounded-2xl shadow-md hover:bg-gray-200 transition duration-300 ease-in-out md:text-lg text-sm">
                    Contact Person
                </a>
            </div>
        </div>
    </div>
    <!-- After Movie -->
    @if($event->after_movie_url)
    <section id="aftermovie" class="mt-12 md:mt-20">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-6">After Movie</h2>

        <div class="flex justify-center">
            <div class="w-full max-w-4xl aspect-video overflow-hidden rounded-lg shadow-lg">
                <iframe
                    class="w-full h-full"
                    src="{{ $event->getEmbedAfterMovieURL() }}"
                    title="After Movie"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>
    @endif

    <!-- dokumentasi -->
    @if($event->status == "finished")
    <section id="dokumentasi" class="mt-12 md:mt-20">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-6">Dokumentasi Kegiatan</h2>
        <div class="flex flex-col md:flex-row justify-center items-center gap-6 md:gap-10 overflow-hidden md:overflow-visible">
            @forelse($event->documentation ?? [] as $doc)
            <img src="{{ asset('storage/'.$doc) }}"
                alt="Dokumentasi"
                class="w-full md:w-64 rounded-2xl shadow-md">
            @empty
            <p class="text-gray-500 italic">Belum ada dokumentasi.</p>
            @endforelse
        </div>
    </section>
    @endif
    <!-- more event -->

    <section id="more-events" class="mt-16">
        <h2 class="text-2xl md:text-3xl font-bold text-left mb-8">More Events</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($moreEvents as $i => $event)
            <a href="{{ route('events.show', ['id' => $event->id]) }}" class="block group w-full {{ $i >= 1 ? 'hidden sm:block' : '' }}">
                <div
                    class="bg-white rounded-3xl shadow-md overflow-hidden hover:shadow-lg hover:shadow-gray-600 ease-in-out transition duration-500 flex flex-col h-full">

                    <!-- cover -->
                    <div class="relative">
                        <img src="{{ $event->cover ? asset('storage/'.$event->cover) : asset('images/posterggs.png') }}"
                            alt="Event Cover"
                            class="w-full h-52 object-cover">

                        <!-- status -->
                        <span
                            class="absolute top-7 left-7 {{ $event->status === 'active' ? 'bg-green-500' : 'bg-gray-400' }} text-white text-xs font-semibold px-3 py-1 rounded-full">
                            {{ ucfirst($event->status) }}
                        </span>
                    </div>

                    <!-- konten -->
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
                            <p class="text-xs text-gray-600 line-clamp-3">
                                {!! Str::limit($event->description, 120) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </a>
            @empty
            <p class="col-span-3 text-center text-gray-500 py-10">
                Belum ada event lain.
            </p>
            @endforelse
        </div>
    </section>




</div>
@endsection