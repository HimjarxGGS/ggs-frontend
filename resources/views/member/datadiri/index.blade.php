@extends('member.layouts.app')

@section('title', 'Data Diri')

@section('content')
    <div class="container mx-auto px-4 py-10 mb-24 mt-24"> {{-- mt-24 kasih jarak dari navbar --}}

        @if (session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

            {{-- Kolom Kiri: Judul + Ilustrasi --}}
            <div class="flex flex-col items-center justify-start relative">
                {{-- Judul di tengah atas gambar --}}
                <h2 class="text-2xl font-bold mb-2 absolute top-0 left-1/2 transform -translate-x-1/2">
                    Data Diri
                </h2>

                {{-- Ilustrasi --}}
                <img src="{{ asset('images/datadiri-page.png') }}" alt="Illustration" class="mb-6 mt-10">

                {{-- Catatan --}}
                <p class="text-sm text-gray-600 italic text-center">
                    *Jika anda member baru, lengkapi biodata supaya bisa mendaftar event!
                </p>
            </div>

            <!-- Kolom Kanan: formulir -->
            <form action="{{ route('member.datadiri.save') }}" method="POST" enctype="multipart/form-data"
                class="w-full space-y-10">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    {{-- Bagian kiri: Input --}}
                    <div class="md:col-span-2 space-y-8">
                        {{-- Nama & Email --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nama" class="block mb-2 text-sm font-semibold text-gray-700">Nama Lengkap
                                    <span
                                        class="w-1 h-1 mb-1 md:ml-0 ml-1 bg-red-500 rounded-full inline-block"></span></label>
                                <input type="text" name="nama" placeholder="Enter your full name"
                                    value="{{ old('nama', $pendaftar?->nama_lengkap) }}"
                                    class="w-full px-5 py-3 rounded-full border border-gray-300 focus:ring-2 focus:ring-palette-4 focus:outline-none text-sm bg-gray-50">
                                @error('nama')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block mb-2 text-sm font-semibold text-gray-700">Email <span
                                        class="w-1 h-1 mb-1 ml-1 md:ml-0 ml-1 bg-red-500 rounded-full inline-block"></span></label>
                                <input type="email" name="email" placeholder="Enter your email"
                                    value="{{ Auth::user()->email }}" readonly
                                    class="w-full px-5 py-3 rounded-full border border-gray-300 focus:ring-2 focus:ring-palette-4 focus:outline-none text-sm bg-gray-50">

                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Instansi, Tgl Lahir, Telepon, Riwayat Penyakit --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="asal_instansi" class="block mb-2 text-sm font-semibold text-gray-700">Asal
                                    Instansi<span
                                        class="w-1 h-1 mb-1 ml-1 bg-red-500 rounded-full inline-block"></span></label>
                                <input type="text" name="asal_instansi" placeholder="Enter your institution "
                                    value="{{ old('asal_instansi', $pendaftar?->asal_instansi) }}"
                                    class="w-full px-5 py-3 rounded-full border border-gray-300 focus:ring-2 focus:ring-palette-4 focus:outline-none text-sm bg-gray-50">
                                @error('asal_instansi')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="date_of_birth" class="block mb-2 text-sm font-semibold text-gray-700">Tanggal
                                    Lahir<span
                                        class="w-1 h-1 mb-1 ml-1 bg-red-500 rounded-full inline-block"></span></label>
                                <input type="date" name="date_of_birth" id="date_of_birth"
                                    value="{{ old('date_of_birth', $pendaftar?->date_of_birth) }}"
                                    class="w-full px-5 py-3 rounded-full border border-gray-300 focus:ring-2 focus:ring-palette-4 focus:outline-none text-sm bg-gray-50">
                                @error('date_of_birth')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="telepon" class="block mb-2 text-sm font-semibold text-gray-700">No.
                                    Telepon<span
                                        class="w-1 h-1 mb-1 ml-1 bg-red-500 rounded-full inline-block"></span></label>
                                <input type="text" name="telepon" placeholder="Enter your phone number"
                                    value="{{ old('telepon', $pendaftar?->no_telepon) }}"
                                    class="w-full px-5 py-3 rounded-full border border-gray-300 focus:ring-2 focus:ring-palette-4 focus:outline-none text-sm bg-gray-50">
                                @error('telepon')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="riwayat_penyakit" class="block mb-2 text-sm font-semibold text-gray-700">Riwayat
                                    Penyakit</label>
                                <input type="text" name="riwayat_penyakit" placeholder="Kosongkan jika tidak ada"
                                    value="{{ old('riwayat_penyakit', $pendaftar?->riwayat_penyakit) }}"
                                    class="w-full px-5 py-3 rounded-full border border-gray-300 focus:ring-2 focus:ring-palette-4 focus:outline-none text-sm bg-gray-50">
                                @error('riwayat_penyakit')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="flex flex-col sm:flex-row gap-4 mt-10">
                            <button type="submit"
                                class="bg-palette-3 text-white px-16 py-3 rounded-full font-semibold text-sm sm:text-base w-full sm:w-auto hover:opacity-90 transition duration-300">
                                Simpan
                            </button>

                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit(); openLogoutModal();"
                                class="border border-gray-400 text-gray-700 px-7 py-3 rounded-full font-semibold text-sm sm:text-base w-full sm:w-auto text-center hover:bg-gray-100 transition duration-300">
                                Log Out
                            </a>
                        </div>
                    </div>

                    {{-- Bagian kanan: Upload Foto --}}
                    <div class="flex flex-col gap-4 items-start w-full">
                        <label for="fotoInput" class="block text-sm font-semibold text-gray-700">Upload Foto<span
                                class="w-1 h-1 mb-1 ml-1 bg-red-500 rounded-full inline-block"></span></label>
                        <input type="file" name="foto" id="fotoInput" accept="image/*"
                            class="text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-palette-3 file:text-white hover:file:bg-palette-4 transition">
                        <img id="previewImage"
                            src="{{ $pendaftar?->registrant_picture
                                ? asset('storage/' . $pendaftar->registrant_picture)
                                : asset('images/default-photo.png') }}"
                            alt="Preview"
                            class="rounded-2xl shadow-md object-cover w-full sm:w-[350px] md:w-[400px] lg:w-[450px] max-h-[350px] mt-2">
                        @error('foto')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </form>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
        </div>
    </div>
    <script>
        document.getElementById('fotoInput').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
@endsection
