@extends('member.layouts.app')

@section('title', 'Detail Pendaftaran')

@section('content')
<div class="container mx-auto px-4 py-6">

   <div class="pt-24">
     <h2 class="text-2xl font-bold mb-6 text-center md:text-left">
        Detail Pendaftaran
     </h2>
   </div>

   <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
       
       {{-- Bagian Kiri --}}
       <div class="space-y-6">
           {{-- Status --}}
           <div class="bg-white rounded-lg shadow p-4">
               <span class="font-semibold">Status:</span>
               <p class="{{ $history->status == 'pending' ? 'text-yellow-600' : 'text-green-600' }}">
                   {{ ucfirst($history->status) }}
               </p>
           </div>

           {{-- Event --}}
           <div class="bg-white rounded-lg shadow p-4">
               <span class="font-semibold">Event:</span>
               <p>{{ $history->name }}</p>
           </div>

           {{-- Personal Data --}}
<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-lg font-semibold mb-4">Personal Data</h3>

    <div class="mb-3">
        <span class="font-semibold">Email:</span>
        <p>{{ $pendaftar->email ?? '-' }}</p>
    </div>
    <div class="mb-3">
        <span class="font-semibold">Nama Lengkap:</span>
        <p>{{ $pendaftar->nama_lengkap ?? '-' }}</p>
    </div>
    <div class="mb-3">
        <span class="font-semibold">Asal Instansi:</span>
        <p>{{ $pendaftar->asal_instansi ?? '-' }}</p>
    </div>
    <div class="mb-3">
        <span class="font-semibold">Usia:</span>
        <p>{{ $pendaftar->date_of_birth ? \Carbon\Carbon::parse($pendaftar->date_of_birth)->age : '-' }}</p>
    </div>
    <div class="mb-3">
        <span class="font-semibold">No Telepon:</span>
        <p>{{ $pendaftar->no_telepon ?? '-' }}</p>
    </div>
    <div class="mb-3">
        <span class="font-semibold">Riwayat Penyakit:</span>
        <p>{{ $pendaftar->riwayat_penyakit ?? '-' }}</p>
    </div>
</div>

       </div>

       {{-- Bagian Kanan --}}
       <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
           <h3 class="text-lg font-semibold mb-4">Payment Proof</h3>
           
           {{-- Gambar --}}
           <div class="w-[250px] h-auto mb-6">
               <img src="{{ asset('images/bukti-transaksi.png') }}" 
                    alt="Bukti Pembayaran" 
                    class="w-full rounded shadow">
           </div>

           {{-- Tombol Contact Person --}}
           <button class="px-6 py-2 border border-red-400 text-blue-500 rounded-lg hover:bg-red-50">
               Contact Person
           </button>
       </div>

   </div>
</div>
@endsection