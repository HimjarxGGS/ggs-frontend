@extends('member.layouts.app')

@section('title', 'Data Diri')

@section('content')
<div class="container mx-auto px-4 py-10 mb-24 mt-24"> {{-- mt-24 kasih jarak dari navbar --}}



    @if(session('success'))
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
        <form action="{{ route('datadiri.store') }}" method="POST" enctype="multipart/form-data" class="w-full">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8"> {{-- gap diperlebar --}}

                {{-- Kolom form kiri (span 2) --}}
                <div class="md:col-span-2 space-y-8"> {{-- jarak antar field lebih lega --}}
                    
                    {{-- Nama & Email --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="border rounded px-3 py-2 w-full h-11">
                        <input type="email" name="email" placeholder="Email" class="border rounded px-3 py-2 w-full h-11">
                    </div>

                    {{-- Asal Instansi + Usia + Telepon + Penyakit + Foto dalam grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                        {{-- Kolom kiri (form fields) --}}
                        <div class="md:col-span-2 space-y-8">
                            <input type="text" name="asal_instansi" placeholder="Asal Instansi" class="border rounded px-3 py-2 w-full h-11">
                            <input type="number" name="usia" placeholder="Usia" class="border rounded px-3 py-2 w-full h-11">
                            <input type="text" name="telepon" placeholder="No. Telepon" class="border rounded px-3 py-2 w-full h-11">
                            <input type="text" name="riwayat_penyakit" placeholder="Riwayat Penyakit" class="border rounded px-3 py-2 w-full h-11">
                        </div>

                        {{-- Kolom kanan (foto) --}}
                        <div class="flex flex-col gap-6 items-start w-full">
                            <label for="fotoInput" class="border rounded px-3 py-2 w-full h-11 flex items-center cursor-pointer bg-[#7B4B36] hover:bg-[#5e3929] text-white justify-center">
                                Tambah Foto
                            </label>
                            <input type="file" name="foto" id="fotoInput" class="hidden" accept="image/*">

                           <img id="previewImage" 
     src="{{ asset('images/default-photo.png') }}" 
     alt="Preview" 
     class="rounded shadow w-96 h-60 object-cover">



                        </div>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex gap-8 mt-8">
                        <button type="submit" class="bg-[#7B4B36] hover:bg-[#5e3929] text-white px-6 py-2 rounded">Simpan</button>
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
