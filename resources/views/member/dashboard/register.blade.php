@extends('member.layouts.app')

@section('title', 'Dashboard Member - Green Generation Surabaya')

@section('content')
    <div class="max-w-6xl mx-auto px-4 mt-28">

        <!-- section header start -->
        <section class="mb-8 text-left md:text-left md:pl-10 pl-3">
            <h1 class="text-xl md:text-3xl font-bold text-gray-800">
                {{ $event->name }}
            </h1>

            <p class="text-gray-600 text-sm md:text-base">{{ $event->organizer ?? 'Green Generation Surabaya' }}</p>

            <span
                class="inline-block mt-3 {{ $event->status == 'upcoming' ? 'bg-orange-500' : 'bg-green-500' }} text-white text-xs md:text-sm font-semibold px-10 py-1 rounded-full">
                {{ ucfirst($event->status) }}
            </span>
        </section>
        <!-- section header end -->

        {{-- alert error submit --}}
        @if (session('success'))
            <div class="mb-6 p-4 rounded-xl bg-green-100 text-green-700 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 p-4 rounded-xl bg-red-100 text-red-700 border border-red-300">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-red-100 text-red-700 border border-red-300">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- section registrasi start -->
        <section class="my-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">

                <!-- poster event -->
                <div>
                    <img src="{{ asset('images/posterggs.png') }}" alt="Poster Event"
                        class="w-full h-auto max-h-[600px] object-contain">
                </div>

                <!-- form registrasi -->
                <div class="space-y-5">
                    <form action="{{ route('member.event.registration.submit', ['eventId' => $event->id]) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <!-- hadir -->
                        <div>
                            <p class="text-sm font-medium text-gray-700 mb-1 ml-4">Bersedia hadir pada hari H?</p>
                            <div class="flex items-center gap-4 ml-4">
                                <label class="flex items-center gap-1 cursor-pointer">
                                    <input type="radio" name="hadir" value="ya" checked> Hadir
                                </label>
                                <label class="flex items-center gap-1 cursor-pointer">
                                    <input type="radio" name="hadir" value="tidak"> Tidak Hadir
                                </label>
                            </div>
                        </div>

                        <!-- tata tertib -->
                        <div>
                            <p class="text-sm font-medium text-gray-700 mb-1 ml-4">Bersedia mengikuti tata tertib?</p>
                            <div class="flex items-center gap-4 ml-4">
                                <label class="flex items-center gap-1 cursor-pointer">
                                    <input type="radio" name="tata_tertib" value="ya" checked> Ya, Saya Bersedia
                                </label>
                                <label class="flex items-center gap-1 cursor-pointer">
                                    <input type="radio" name="tata_tertib" value="tidak"> Tidak
                                </label>
                            </div>
                        </div>

                        <!-- pembayaran -->
                        <div>
                            <p class="text-sm font-medium text-gray-700 mb-1 ml-4">Pembayaran Melalui?</p>
                            <div class="ml-2">
                                <label class="flex items-center gap-2 p-2 cursor-pointer">
                                    <input type="radio" name="pembayaran_via" value="bsi">
                                    <span>BSI 726741218 a.n Nanda Aliefira</span>
                                </label>
                                <label class="flex items-center gap-2 p-2 cursor-pointer">
                                    <input type="radio" name="pembayaran_via" value="ovo">
                                    <span>OVO 085784246763 a.n Nanda Aliefira</span>
                                </label>
                                <label class="flex items-center gap-2 p-2 cursor-pointer">
                                    <input type="radio" name="pembayaran_via" value="gopay">
                                    <span>GOPAY 085784246763 a.n Nanda Aliefira</span>
                                </label>
                            </div>
                        </div>

                        <!-- Bukti Share Poster -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2 ml-1">Bukti Share Poster</label>

                            <div id="posterWrapper"
                                class="relative flex items-center justify-center w-full h-52 md:h-36 border-2 border-dashed rounded-2xl bg-gray-50 hover:bg-gray-100 transition cursor-pointer overflow-hidden">

                                <!-- Default Upload UI -->
                                <div id="posterDefault"
                                    class="flex flex-col items-center justify-center text-center pointer-events-none">
                                    <svg class="w-8 h-8 mb-2 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5
                              5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5
                              5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="text-sm text-gray-600">
                                        <span class="font-semibold text-palette-2">Click to upload</span> or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-400">PNG / JPG / JPEG</p>
                                </div>

                                <!-- Image Preview -->
                                <img id="posterPreview" class="hidden w-full h-full object-contain rounded-2xl" />

                                <input id="poster" name="bukti_share" type="file"
                                    class="absolute inset-0 opacity-0 cursor-pointer" />
                            </div>
                        </div>



                        <!-- Bukti Pembayaran -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2 ml-1">Bukti Pembayaran</label>

                            <div id="pembayaranWrapper"
                                class="relative flex items-center justify-center w-full h-52 md:h-36 border-2 border-dashed rounded-2xl bg-gray-50 hover:bg-gray-100 transition cursor-pointer overflow-hidden">

                                <div id="pembayaranDefault"
                                    class="flex flex-col items-center justify-center text-center pointer-events-none">
                                    <svg class="w-8 h-8 mb-2 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5
                              5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5
                              5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="text-sm text-gray-600">
                                        <span class="font-semibold text-palette-2">Click to upload</span> or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-400">PNG / JPG / JPEG</p>
                                </div>

                                <img id="pembayaranPreview" class="hidden w-full h-full object-contain rounded-2xl" />

                                <input id="pembayaran" name="bukti_payment" type="file"
                                    class="absolute inset-0 opacity-0 cursor-pointer" />
                            </div>
                        </div>


                        <!-- tombol registrasi -->
                        <button type="submit"
                            class="w-full bg-palette-5 text-white py-3 rounded-3xl font-semibold hover:bg-brown-600 transition duration-300 hover:bg-[#8b5339]">
                            Registrasi Event
                        </button>
                    </form>

                    <p class="text-sm text-gray-600">
                        *Pastikan Data Diri Sudah Terisi 
                        <a href="/data-diri" class="text-blue-500 hover:underline">Lihat Data Diri</a>
                    </p>

                    <a href="https://wa.me/6281216132795"
                        class="block text-center bg-gray-200 text-gray-800 rounded-3xl py-3 hover:bg-gray-300 transition">
                        Contact Person
                    </a>
                </div>
            </div>
        </section>
        <!-- section registrasi end -->
    </div>

    <script>
        function setupPreview(inputId, previewId, defaultId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const def = document.getElementById(defaultId);

            input.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (!file) return;

                const reader = new FileReader();

                reader.onload = function(event) {
                    preview.src = event.target.result;
                    preview.classList.remove('hidden');
                    def.classList.add('hidden');
                };

                reader.readAsDataURL(file);
            });
        }

        setupPreview('poster', 'posterPreview', 'posterDefault');
        setupPreview('pembayaran', 'pembayaranPreview', 'pembayaranDefault');
    </script>

@endsection
