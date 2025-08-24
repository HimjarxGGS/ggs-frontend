@extends('member.layouts.app')

@section('title', 'Data Diri')

@section('content')
<div class="container mx-auto px-4 py-10">

    <h2 class="text-2xl font-bold mb-8">Data Diri</h2>

    @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

        {{-- Ilustrasi --}}
        <div class="flex flex-col items-center justify-center">
            <img src="{{ asset('images/datadiri-page.png') }}" alt="Illustration" class="mb-4">
            <p class="text-sm text-gray-600 italic text-center">
                *Jika anda member baru, lengkapi biodata supaya bisa mendaftar event!
            </p>
        </div>

        {{-- Form --}}
        <form action="{{ route('datadiri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 w-full">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="nama" placeholder="Nama Lengkap" class="border rounded px-3 py-2 w-full">
                <input type="email" name="email" placeholder="Email" class="border rounded px-3 py-2 w-full">
            </div>

            <input type="text" name="instansi" placeholder="Asal Instansi" class="border rounded px-3 py-2 w-full">
            <input type="number" name="usia" placeholder="Usia" class="border rounded px-3 py-2 w-full">
            <input type="text" name="telepon" placeholder="No. Telepon" class="border rounded px-3 py-2 w-full">
            <input type="text" name="riwayat_penyakit" placeholder="Riwayat Penyakit" class="border rounded px-3 py-2 w-full">

            <div class="flex items-center gap-4">
                <label class="flex items-center gap-2 px-4 py-2 bg-[#A47C65] text-white rounded cursor-pointer">
                    📁 <span>Tambah File</span>
                    <input type="file" name="foto" class="hidden">
                </label>
                <img src="https://via.placeholder.com/120x160" alt="Preview" class="rounded shadow">
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-[#A47C65] text-white px-6 py-2 rounded">Simpan</button>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="border px-6 py-2 rounded">Log out</a>
            </div>
        </form>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
    </div>
</div>

<footer class="text-center text-sm text-gray-500 mt-12 py-4">
    powered by greencomunitionsurabaya & himse.telkomsurabaya
</footer>
@endsection
