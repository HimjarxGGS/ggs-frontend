@extends('guest.layouts.app')

@section('title', 'List Event - Green Generation Surabaya')

@section('content')
<section class="px-4 md:px-12 lg:px-20 py-10 mt-28">
    <!-- Header Section -->
    <div class="mb-10">
        <h1 class="text-2xl md:text-3xl font-bold text-black text-center">List Event</h1>
        <p class="text-sm md:text-base text-gray-600 text-center">
            Seluruh event yang ada pada Green Generation Surabaya
        </p>
    </div>

    <!-- Search + Filter -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
        <!-- Search -->
        <div class="relative w-96 md:w-1/2 ml-10 lg:ml-0">
            <input type="text" placeholder="Search Event"
                class="w-full border rounded-full px-8 py-2 focus:outline-none focus:ring-2 focus:ring-palette-4 transition duration-300">
            <button class="absolute right-7 top-2.5">
                <img src="{{ asset('icons/search.svg') }}" alt="Search" class="w-5 h-5">
            </button>
        </div>

        <!-- Dropdown -->
        <div x-data="{ open: false, selected: 'Event Terbaru' }" class="w-96 md:w-1/4 relative ml-10 lg:ml-0">
            <label for="sort" class="block text-sm text-gray-600 mb-1">Urut Berdasarkan:</label>

            <!-- Trigger button -->
            <button
                @click="open = !open"
                class="w-full flex justify-between items-center border rounded-full px-8 py-2 text-sm md:text-base font-medium text-gray-800 focus:outline-none focus:ring-2 focus:ring-palette-4 transition duration-200">
                <span x-text="selected"></span>
                <svg :class="{ 'rotate-180': open }" class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown list -->
            <div
                x-show="open"
                x-transition
                @click.outside="open = false"
                class="absolute z-10 w-full mt-2 bg-white border rounded-lg shadow-lg">
                <ul class="py-1 text-sm text-gray-700">
                    <li>
                        <button
                            @click="selected = 'Event Terbaru'; open = false"
                            class="block w-full text-left px-4 py-2 hover:text-white hover:bg-palette-3">Event Terbaru</button>
                    </li>
                    <li>
                        <button
                            @click="selected = 'Event Terlama'; open = false"
                            class="block w-full text-left px-4 py-2 hover:text-white hover:bg-palette-3">Event Terlama</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Card Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full">
    @forelse ($events as $event)
    <a href="{{ route('events.show', ['id' => $event->id]) }}" class="block group w-full">
        <div
            class="bg-white rounded-3xl shadow-md overflow-hidden hover:shadow-lg hover:shadow-gray-600 ease-in-out transition duration-500 flex flex-col h-full">
            
            <!-- cover -->
            <div class="relative">
                <img src="{{ $event->cover ? asset('storage/'.$event->cover) : asset('images/posterggs.png') }}"
                    alt="Event Cover"
                    class="w-full h-52 object-cover">

                <!-- status -->
                <span
                    class="absolute top-7 left-7 {{ $event->status === 'active' ? 'bg-green-500' : 'bg-orange-500' }} text-white text-xs font-semibold px-3 py-1 rounded-full">
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
        Belum ada event.
    </p>
    @endforelse
</div>

    <!-- Pagination -->
    <div class="mt-10 flex justify-center">
        {{ $events->links() }}
    </div>
</section>
@endsection
