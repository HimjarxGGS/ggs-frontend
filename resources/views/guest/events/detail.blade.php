@extends('guest.layouts.app')

@section('title', 'Detail Event - ' . $event->name)

@section('content')
<div class="max-w-6xl mx-auto px-4 mt-40 font-geist">

    <!-- header -->
    <div class="text-center mb-12">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800">{{ $event->name }}</h1>
        <p class="text-gray-500 mt-2">Green Generation Surabaya</p>

        <span class="inline-block mt-4 px-6 py-1 text-sm rounded-full
            {{ $event->status == 'upcoming' ? 'bg-green-500 text-white' : 'bg-orange-500 text-white' }}">
            {{ ucfirst($event->status) }}
        </span>
    </div>

    <!-- grid konten -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- poster -->
        <div>
            <img src="{{ $event->poster ? asset('storage/'.$event->poster) : asset('images/gambar-event.png') }}"
                 alt="Poster Event"
                 class="w-full h-auto rounded-2xl shadow-md object-contain">
        </div>

        <!-- detail -->
        <div class="space-y-6">
            <!-- tanggal -->
            <div class="flex items-center gap-3">
                <img src="{{ asset('icons/calender.svg') }}" alt="Calendar" class="w-5 h-5">
                <span class="text-gray-700 text-lg font-medium">
                    {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y, H:i') }}
                </span>
            </div>

            <!-- lokasi -->
            <div class="flex items-center gap-3">
                <img src="{{ asset('icons/location.svg') }}" alt="Location" class="w-5 h-5">
                <span class="text-gray-700 text-lg font-medium">
                    {{ $event->location ?? 'Lokasi belum ditentukan' }}
                </span>
            </div>

            <!-- deskripsi -->
            <div>
                <h3 class="text-xl font-semibold text-palette-2 mb-2">Deskripsi</h3>
                <p class="text-gray-600 leading-relaxed">
                    {{ $event->description }}
                </p>
            </div>

            <!-- CTA -->
            <div class="flex flex-wrap gap-4 mt-6">
                <a href="{{ $event->registration_link ?? '#' }}"
                   class="bg-palette-2 text-white px-6 py-2 rounded-xl hover:bg-palette-3 transition">
                    Daftar Sekarang
                </a>
                <a href="https://wa.me/{{ $event->contact_person ?? '628123456789' }}"
                   class="bg-gray-200 text-gray-800 px-6 py-2 rounded-xl hover:bg-gray-300 transition">
                    Contact Person
                </a>
            </div>
        </div>
    </div>

    <!-- dokumentasi -->
    @if($event->status == 'finished')
    <div class="mt-16">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Dokumentasi</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @forelse($event->documentation ?? [] as $doc)
                <img src="{{ asset('storage/'.$doc) }}"
                     alt="Dokumentasi"
                     class="w-full h-48 object-cover rounded-xl shadow-md">
            @empty
                <p class="text-gray-500 italic col-span-3">Belum ada dokumentasi.</p>
            @endforelse
        </div>
    </div>
    @endif

</div>
@endsection
