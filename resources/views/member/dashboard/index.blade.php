@extends('member.layouts.app')

@section('title', 'Dashboard Member - Green Generation Surabaya')

@section('content')
<div class="container mx-auto px-4 py-10">

    <!-- hero -->
    <div class="flex flex-col md:flex-row md:justify-center md:items-center md:space-x-40 mb-12 mt-28 text-left md:text-left">
        <div class="order-1 md:order-none mb-6 md:mb-0">
            <h2 class="text-lg sm:text-xl md:text-2xl">
                Hi, <em class="text-palette-3 font-semibold">{{ $users->username }}!</em>
            </h2>
            <h1 class="text-xl sm:text-2xl md:text-3xl font-bold">Welcome to Dashboard Member.</h1>
            <p class="text-gray-500 text-xs sm:text-sm md:text-base">
                *Lengkapi data diri kamu sebelum daftar event ya!
            </p>
        </div>
        <img src="{{ asset('images/dashboard page.png') }}"
             alt="Dashboard Page" 
             class="w-60 sm:w-72 md:w-80 h-auto order-2 md:order-none mx-auto md:mx-0">
    </div>

    <!-- event section -->
    <section>
        <h3 class="text-2xl font-bold mb-4">Event</h3>

        <!-- search and short -->
        <form method="GET" 
            action="{{ route('member.dashboard.index') }}" 
            class="flex flex-col md:flex-row md:items-center md:space-x-6 mb-8 space-y-4 md:space-y-0">
            
            <!-- input search -->
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Search Event" 
                class="border border-gray-300 rounded-lg px-4 py-2 w-80 md:w-96" 
            />

            <!-- label + dropdown -->
            <div class="flex items-center space-x-3">
                <span class="text-gray-600 text-sm font-medium whitespace-nowrap">
                    Urut berdasarkan:
                </span>

                <div x-data="{ open: false }" class="relative w-full md:w-auto">
                    <button type="button" 
                            @click="open = !open"
                            class="border border-gray-300 rounded-lg px-4 py-2 w-full md:w-auto flex justify-between items-center">
                        {{ request('sort') == 'oldest' ? 'Event Terlama' : 'Event Terbaru' }}
                        <svg class="w-4 h-4 ml-2 transform transition-transform duration-200" 
                            :class="{ 'rotate-180': open }" 
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open"
                        @click.away="open = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute z-10 mt-2 w-full md:w-48 bg-white border border-gray-200 rounded-lg shadow-lg">
                        <a href="{{ route('member.dashboard.index', ['sort' => 'latest']) }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Event Terbaru</a>
                        <a href="{{ route('member.dashboard.index', ['sort' => 'oldest']) }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Event Terlama</a>
                    </div>
                </div>
            </div>
        </form>

        <!-- event list -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-items-center">
            @forelse ($events as $event)
            <a href="{{ route('member.events.show', $event->id) }}" class="block group w-full sm:w-auto">
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg hover:shadow-gray-600 ease-in-out transition duration-500">
                        <div class="relative">
                            <!-- cover -->
                            <img src="{{ asset($event->cover ?? 'images/gambar-event.png') }}" 
                                 alt="Event Cover" 
                                 class="w-full h-52 object-scale-down mt-10">
                            
                            <!-- status -->
                            <span class="absolute top-7 left-7 bg-orange-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                {{ ucfirst($event->status) }}
                            </span>
                        </div>
                        <div class="p-4 space-y-2">
                            <!-- judul -->
                            <h3 class="text-lg font-semibold">{{ $event->name }}</h3>
                            
                            <!-- penerbit -->
                            <p class="text-gray-500 text-xs">{{ $event->penerbit ?? 'Green Generation Surabaya' }}</p>
                            
                            <!-- tanggal -->
                            <div class="flex items-center text-xs text-gray-500 gap-2">
                                <img src="{{ asset('icons/calender.svg') }}" 
                                     alt="Calendar" 
                                     class="w-4 h-4">
                                <span>{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}</span>
                            </div>
                            
                            <!-- deskripsi -->
                            <p class="text-xs text-gray-600 pb-14">
                                {{ $event->description }}
                            </p>
                        </div>
                    </div>
                </a>
            @empty
                <p class="col-span-3 text-center text-gray-500 py-10">
                    Belum ada event yang tersedia.
                </p>
            @endforelse
        </div>

       <!-- paginate -->
        @if ($events->hasPages())
            <div class="flex justify-center mt-10">
                <div class="flex space-x-2">

                    <!-- mobile -->
                    <div class="flex md:hidden space-x-2 text-sm">

                        <!-- first -->
                        @if ($events->onFirstPage())
                            <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">First</span>
                        @else
                            <a href="{{ $events->url(1) }}"
                            class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">First</a>
                        @endif

                        <!-- prev -->
                        @if ($events->onFirstPage())
                            <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Prev</span>
                        @else
                            <a href="{{ $events->previousPageUrl() }}"
                            class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Prev</a>
                        @endif

                        <!-- current -->
                        <span class="px-3 py-2 bg-palette-3 text-white rounded-lg shadow">
                            {{ $events->currentPage() }}
                        </span>

                        <!-- next page number -->
                        @if ($events->currentPage() < $events->lastPage())
                            <a href="{{ $events->url($events->currentPage() + 1) }}"
                            class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">
                                {{ $events->currentPage() + 1 }}
                            </a>
                        @endif

                        <!-- next -->
                        @if ($events->hasMorePages())
                            <a href="{{ $events->nextPageUrl() }}"
                            class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Next</a>
                        @else
                            <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Next</span>
                        @endif

                        <!-- last -->
                        @if ($events->currentPage() == $events->lastPage())
                            <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Last</span>
                        @else
                            <a href="{{ $events->url($events->lastPage()) }}"
                            class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Last</a>
                        @endif
                    </div>

                    <!-- desktop -->
                    <div class="hidden md:flex space-x-2">
                        <!-- first -->
                        @if ($events->onFirstPage())
                            <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">First</span>
                        @else
                            <a href="{{ $events->url(1) }}" 
                            class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">First</a>
                        @endif

                        <!-- prev -->
                        @if ($events->onFirstPage())
                            <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Prev</span>
                        @else
                            <a href="{{ $events->previousPageUrl() }}" 
                            class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Prev</a>
                        @endif

                        <!-- no page with ellipsis -->
                        @php
                            $start = max(1, $events->currentPage() - 2);
                            $end = min($events->lastPage(), $events->currentPage() + 2);
                        @endphp

                        <!-- jika halaman lebih besar dari 1 -->
                        @if ($start > 1)
                            <a href="{{ $events->url(1) }}" 
                            class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">1</a>
                            @if ($start > 2)
                                <span class="px-3 py-2">…</span>
                            @endif
                        @endif

                        <!-- halaman aktif -+ 2 -->
                        @for ($i = $start; $i <= $end; $i++)
                            @if ($i == $events->currentPage())
                                <span class="px-4 py-2 bg-palette-3 text-white rounded-lg shadow">{{ $i }}</span>
                            @else
                                <a href="{{ $events->url($i) }}" 
                                class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">{{ $i }}</a>
                            @endif
                        @endfor

                        <!-- jika halaman terakhir lebih besar dari end -->
                        @if ($end < $events->lastPage())
                            @if ($end < $events->lastPage() - 1)
                                <span class="px-3 py-2">…</span>
                            @endif
                            <a href="{{ $events->url($events->lastPage()) }}" 
                            class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">{{ $events->lastPage() }}</a>
                        @endif

                        <!-- next -->
                        @if ($events->hasMorePages())
                            <a href="{{ $events->nextPageUrl() }}" 
                            class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Next</a>
                        @else
                            <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Next</span>
                        @endif

                        <!-- last -->
                        @if ($events->currentPage() == $events->lastPage())
                            <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Last</span>
                        @else
                            <a href="{{ $events->url($events->lastPage()) }}" 
                            class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Last</a>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </section>
</div>
@endsection
