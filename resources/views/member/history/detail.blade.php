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
                <p>{{ $history->event_name }}</p>
            </div>

            {{-- Personal Data --}}
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Personal Data</h3>
                
                <div class="mb-3">
                    <span class="font-semibold">Email:</span>
                    <p>{{ $history->email }}</p>
                </div>

                <div class="mb-3">
                    <span class="font-semibold">Nama Lengkap:</span>
                    <p>{{ $history->nama }}</p>
                </div>

                <div class="mb-3">
                    <span class="font-semibold">Asal Instansi:</span>
                    <p>{{ $history->instansi }}</p>
                </div>

                <div class="mb-3">
                    <span class="font-semibold">Usia:</span>
                    <p>{{ $history->usia }}</p>
                </div>

                <div class="mb-3">
                    <span class="font-semibold">No Telepon:</span>
                    <p>{{ $history->telepon }}</p>
                </div>

                <div class="mb-3">
                    <span class="font-semibold">Riwayat Penyakit:</span>
                    <p>{{ $history->penyakit }}</p>
                </div>
            </div>
        </div>

        {{-- Bagian Kanan --}}
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <h3 class="text-lg font-semibold mb-4">Payment Proof</h3>
            <div class="w-[250px] h-auto">
               <img src="{{ asset('images/bukti-transaksi.png') }}" 
                     alt="Bukti Pembayaran" 
                     class="w-full rounded shadow">
            </div>
            
            {{-- Contact Person Button --}}
            <div class="mt-6">
                <button class="px-6 py-2 border border-red-400 text-blue-500 rounded-lg hover:bg-red-50">
                    Contact Person
                </button>
            </div>
        </div>

    </div>
</div>
@endsection
