@extends('guest.layouts.app')

@section('title', 'Detail Event - ' . $event->name)

@section('content')
<div class="max-w-6xl mx-auto px-4 mt-20 font-geist">

    <!-- header -->
    <div class="mb-8 text-center md:text-left">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
            {{ $event->name }}
        </h1>
        <p class="text-gray-600 text-sm md:text-base">Green Generation Surabaya</p>

        <span
            class="inline-block mt-3 text-xs md:text-sm font-semibold px-10 py-1 rounded-full
            {{ $event->status == 'upcoming' ? 'bg-orange-500 text-white' : 'bg-green-500 text-white' }}">
            {{ ucfirst($event->status) }}
        </span>
    </div>

    <!-- poster & detail -->
    <div class="grid md:grid-cols-2 gap-6 items-start">

        <!-- poster -->
        <div class="bg-transparent">
            <img src="{{ $event->poster ? asset('storage/'.$event->poster) : asset('images/posterggs.png') }}"
                alt="Poster Event"
                class="w-full h-auto max-h-[900px] object-contain rounded-lg bg-transparent">

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
                        <p class="text-wrap">
                            {!! $event->description !!}
                        </p>


                    </div>
                </div>
            </div>

            <!-- cta -->
            <div class="p-4 border rounded-xl shadow-md flex justify-center gap-4 mt-6">
                <!-- button daftar -->
                @if($event->status == "active")
                <a href="{{ route('event.registration', $event->id) }}"
                    class="px-5 md:px-6 py-3 flex bg-palette-5 text-white rounded-2xl shadow-md hover:bg-green-500 transition duration-300 ease-in-out md:text-lg text-sm">
                    Daftar Sekarang
                </a>
                @endif
                <!-- button contact person -->
                @if($event->status == "finished" || $event->sertif_url)
                <section id="certificate" class="text-center">
                    <button
                        id="openCertificateModal"
                        class="px-5 md:px-6 py-3 bg-palette-5 text-white rounded-2xl shadow-md hover:bg-green-500 transition duration-300 ease-in-out md:text-lg text-sm">
                        Cek Sertifikat
                    </button>
                </section>
                @endif
                <!-- <a href="https://wa.me/{{ $event->contact_person ?? '628123456789' }}"
                    class="px-5 md:px-6 py-3 border border-black text-black rounded-2xl shadow-md hover:bg-gray-200 transition duration-300 ease-in-out md:text-lg text-sm">
                    Contact Person
                </a> -->
            </div>
        </div>
    </div>
    <!-- After Movie -->
    @if ($event->after_movie_url)
    <section id="aftermovie" class="mt-12 md:mt-20">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-6">After Movie</h2>

        <div class="flex justify-center">
            <div class="w-full max-w-4xl aspect-video overflow-hidden rounded-lg shadow-lg">
                <iframe class="w-full h-full" src="{{ $event->getEmbedAfterMovieURL() }}" title="After Movie"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>
    @endif
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
            @forelse($event->dokumentasi ?? [] as $doc)
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
            @forelse($moreEvents as $i => $eventMore)
            <a href="{{ route('events.show', ['id' => $eventMore->id]) }}" class="block group w-full {{ $i >= 1 ? 'hidden sm:block' : '' }}">
                <div
                    class="bg-white rounded-3xl shadow-md overflow-hidden hover:shadow-lg hover:shadow-gray-600 ease-in-out transition duration-500 flex flex-col h-full">

                    <!-- cover -->
                    <div class="relative">
                        <img src="{{ $event->cover ? asset('storage/'.$event->cover) : asset('images/posterggs.png') }}"
                            alt="Event Cover"
                            class="w-full h-52 object-cover">

                        <!-- status -->
                        <span
                            class="absolute top-7 left-7 {{ $eventMore->status === 'active' ? 'bg-green-500' : 'bg-gray-400' }} text-white text-xs font-semibold px-3 py-1 rounded-full">
                            {{ ucfirst($eventMore->status) }}
                        </span>
                    </div>

                    <!-- konten -->
                    <div class="p-4 flex flex-col justify-between flex-1">
                        <div class="space-y-2">
                            <!-- judul -->
                            <h3 class="text-lg font-semibold line-clamp-2">{{ $eventMore->name }}</h3>
                            <!-- default penerbit -->
                            <p class="text-gray-500 text-xs">Green Generation Surabaya</p>
                            <!-- tanggal event -->
                            <div class="flex items-center text-xs text-gray-400 gap-2">
                                <img src="{{ asset('icons/calender.svg') }}" alt="Calendar" class="w-4 h-4">
                                <span>{{ \Carbon\Carbon::parse($eventMore->event_date)->translatedFormat('d F Y') }}</span>
                            </div>
                            <!-- deskripsi -->
                            <p class="text-xs text-gray-600 line-clamp-3">
                                {!! Str::limit($eventMore->description, 120) !!}
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

<div id="certificateModal" class="fixed flex inset-0 bg-black/60 z-[9999] hidden justify-center items-center transform scale-95 opacity-0 transition-all duration-300">
    <div class="bg-white rounded-2xl shadow-lg p-6 w-96 relative">
        <div class="flex justify-end">
            <button id="closeCertificateModal" class="relative top-0 right-0 ">
                <h1>x</h1>
            </button>
        </div>

        <h2 class="text-xl font-semibold">Check Your Certificate</h2>

        <p class="text-sm text-gray-500 mb-4">Enter your registered email to access the certificate.</p>

        <form id="certificateForm" class="space-y-3">
            <input
                type="email"
                id="certEmail"
                name="email"
                required
                placeholder="Enter your email"
                class="w-full border px-4 py-2 rounded-lg focus:ring focus:ring-palette-4 text-sm">


            <button
                type="submit"
                class="w-full bg-palette-5 text-white py-2 rounded-lg hover:bg-gray-600 transition duration-300">
                Check Certificate
            </button>
        </form>

        <div id="certResult" class="mt-4 text-center hidden"></div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('certificateModal');
        const openBtn = document.getElementById('openCertificateModal');
        const closeBtn = document.getElementById('closeCertificateModal');
        const form = document.getElementById('certificateForm');
        const resultBox = document.getElementById('certResult');

        if (!openBtn) return; // if event is not finished, skip

        function showModal() {
            modal.classList.remove('hidden');

            setTimeout(() => {
                modal.classList.add('flex');
                modal.style.opacity = '1';
                modalBox.classList.remove('scale-95', 'opacity-0');
                modalBox.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function hideModal() {
            modal.classList.add('hidden');
            modal.style.opacity = '0';
            modalBox.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 250);
        }

        openBtn.addEventListener('click', () => showModal());
        closeBtn.addEventListener('click', () => hideModal());

        // Close when clicking outside modal box
        document.addEventListener('click', (e) => {
            if (e.target === modal) hideModal();
        });

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            resultBox.classList.remove('hidden');
            resultBox.innerHTML = '<p class="text-gray-500">Checking...</p>';

            const email = document.getElementById('certEmail').value;


            const eventId = "{{$event -> id}}";

            try {
                const response = await fetch("{{ route('certificate.check') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        email,
                        event_id: eventId
                    })
                });

                const data = await response.json();

                if (response.ok && data.valid) {
                    resultBox.innerHTML = `
                    <p class="text-green-600 mb-3">Email verified! 🎉</p>
                    <a href="${data.certificate_url}" target="_blank" 
                       class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                       View Certificate
                    </a>`;
                } else {
                    resultBox.innerHTML = `<p class="text-red-500">${data.message || 'Email not found for this event.'}</p>`;
                }
            } catch (err) {
                resultBox.innerHTML = `<p class="text-red-500">Something went wrong. Try again later.</p>`;
            }
        });
    });
</script>

@endsection