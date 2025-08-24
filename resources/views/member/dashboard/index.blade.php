@extends('member.layouts.app')

@section('title', 'Dashboard Member - Green Generation Surabaya')

@section('content')
<div class="container mx-auto px-4 py-10">
   
   <div class="flex justify-center items-center space-x-6 mb-12 mt-16">
    <img src="{{ asset('images/dashboard page.png') }}"
         alt="Dashboard Page" 
         class="w-80 h-auto">
    <div>
        <h2 class="text-xl">Hi, <em>Komting</em></h2>
        <h1 class="text-2xl font-bold">Welcome to Dashboard Member!</h1>
    </div>
</div>
   
    <section>
        <h3 class="text-2xl font-bold mb-4">Event</h3>
        
     
        <div class="flex flex-col md:flex-row md:items-center md:space-x-6 mb-8 space-y-4 md:space-y-0">
            <input type="text" placeholder="Search Event" class="border border-gray-300 rounded-lg px-4 py-2 w-full md:flex-grow" />
            <select class="border border-gray-300 rounded-lg px-4 py-2 w-full md:w-auto">
                <option>Event Terbaru</option>
                <option>Event Terlama</option>
            </select>
        </div>

       
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-items-center">
    @forelse ($events as $event)
        <a href="" class="block group">
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
                    <h3 class="text-lg font-semibold">{{ $event->name}}</h3>
                    <!-- default penerbit -->
                    <p class="text-gray-500 text-xs">{{ $event->penerbit ?? 'Green Generation Surabaya' }}</p>
                    <!-- tanggal -->
                    <div class="flex items-center text-xs text-gray-500 gap-2">
                        <img src="{{ asset('icons/calender.svg') }}" alt="Calendar" class="w-4 h-4">
                        <span>{{ \Carbon\Carbon::parse($event->tanggal ?? now())->translatedFormat('d F Y') }}</span>
                    </div>
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


       
        <div class="mt-10 flex justify-center space-x-3 text-sm text-gray-600">
            <button class="px-3 py-1 rounded bg-yellow-300 font-semibold">1</button>
            <button class="px-3 py-1 rounded hover:bg-gray-200">2</button>
            <button class="px-3 py-1 rounded hover:bg-gray-200">3</button>
            <span class="px-3 py-1">...</span>
            <button class="px-3 py-1 rounded hover:bg-gray-200">19</button>
            <button class="px-3 py-1 rounded hover:bg-gray-200">20</button>
            <button class="px-3 py-1 rounded hover:bg-gray-200">&gt;</button>
        </div>
    </section>
</div>
@endsection
