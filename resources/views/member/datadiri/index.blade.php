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


            {{-- Kolom Kanan: Form --}}
            <form action="{{ route('member.datadiri.save') }}" method="POST" enctype="multipart/form-data" class="w-full">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="md:col-span-2 space-y-8">

                        {{-- Nama & Email --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <input type="text" name="nama" placeholder="Nama Lengkap"
                                    value="{{ old('nama', $pendaftar?->nama_lengkap) }}"
                                    class="border rounded px-3 py-2 w-full h-11 @error('nama') border-red-500 @enderror">
                                @error('nama')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <input type="email" name="email" placeholder="Email"
                                    value="{{ old('email', $pendaftar?->email) }}"
                                    class="border rounded px-3 py-2 w-full h-11 @error('email') border-red-500 @enderror">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Asal Instansi + Usia + Telepon + Penyakit --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="md:col-span-2 space-y-8">

                                <div>
                                    <input type="text" name="asal_instansi" placeholder="Asal Instansi"
                                        value="{{ old('asal_instansi', $pendaftar?->asal_instansi) }}"
                                        class="border rounded px-3 py-2 w-full h-11 @error('asal_instansi') border-red-500 @enderror">
                                    @error('asal_instansi')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Tanggal
                                        Lahir</label>
                                    <input type="date" name="date_of_birth" id="date_of_birth"
                                        value="{{ old('date_of_birth', $pendaftar?->date_of_birth) }}"
                                        class="border rounded px-3 py-2 w-full h-11 @error('date_of_birth') border-red-500 @enderror">
                                    @error('date_of_birth')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <input type="text" name="telepon" placeholder="No. Telepon"
                                        value="{{ old('telepon', $pendaftar?->no_telepon) }}"
                                        class="border rounded px-3 py-2 w-full h-11 @error('telepon') border-red-500 @enderror">
                                    @error('telepon')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <input type="text" name="riwayat_penyakit" placeholder="Riwayat Penyakit"
                                        value="{{ old('riwayat_penyakit', $pendaftar?->riwayat_penyakiti) }}"
                                        class="border rounded px-3 py-2 w-full h-11 @error('riwayat_penyakit') border-red-500 @enderror">
                                    @error('riwayat_penyakit')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Kolom kanan (foto) --}}
                            <div class="flex flex-col gap-6 items-start w-full">
                                <label for="fotoInput"
                                    class="border rounded px-3 py-2 w-full h-11 flex items-center cursor-pointer bg-[#7B4B36] hover:bg-[#5e3929] text-white justify-center">
                                    Tambah Foto
                                </label>
                                <input type="file" name="foto" id="fotoInput" class="hidden" accept="image/*">
                                <img id="previewImage"
                                    src="{{ $pendaftar?->registrant_picture
                                        ? asset('storage/' . $pendaftar->registrant_picture)
                                        : asset('images/default-photo.png') }}"
                                    alt="Preview"
                                    class="rounded shadow object-cover w-full sm:w-[400px] md:w-[500px] lg:w-[600px] max-h-[400px] object-cover mt-2 ml-0 sm:ml-4 z-10 overflow-hidden">
                                @error('foto')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        {{-- Tombol --}}
                        <div class="flex gap-8 mt-8">
                            <button type="submit"
                                class="bg-[#7B4B36] hover:bg-[#5e3929] text-white px-6 py-2 rounded">Simpan</button>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="border px-6 py-2 rounded">Log out</a>
                        </div>
                    </div>
                </div>
            </form>



            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
        </div>
    </div>
    <!--
                        <footer class="text-center text-sm text-gray-500 mt-16 py-6">
                            powered by greencomunitionsurabaya & himse.telkomsurabaya
                        </footer> -->

    {{-- Script Preview Foto --}}
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
