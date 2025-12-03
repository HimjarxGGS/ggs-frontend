@extends('member.layouts.app')

@section('title', 'Detail Pendaftaran')

@section('content')
    <div class="container mx-auto px-4 py-6">

        <div class="pt-32">
            <h2 class="text-2xl font-bold mb-6 text-center md:text-left">
                Detail Pendaftaran
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-16">

            <!-- align left -->
            <div class="space-y-9">

                <!-- status -->
                <div class="relative border border-gray-300 rounded-3xl p-6 w-full md:w-1/2 mx-auto md:mx-0">
                    <span class="absolute -top-3 left-3 bg-white px-5 text-base font-semibold">
                        Status
                    </span>
                    <p
                        class="text-center md:text-left {{ $pendaftaranEvent->status == 'pending' ? 'text-yellow-600 font-bold' : 'text-green-600 font-bold' }}">
                        {{ ucfirst($pendaftaranEvent->status) }}

                    </p>
                </div>

                <!-- event -->
                <div class="relative border border-gray-300 rounded-3xl p-6">
                    <span class="absolute -top-3 left-3 bg-white px-5 text-base font-semibold">
                        Event
                    </span>
                    <p class="font-semibold text-palette-3">{{ $event->name }}
                    </p>
                </div>

                <!-- personal data -->
                <div class="relative border border-gray-300 rounded-3xl p-6">
                    <span class="absolute -top-3 left-3 bg-white px-5 text-base font-semibold">
                        Personal Data
                    </span>

                    <div class="mb-3">
                        <span class="text-sm text-gray-500">Email:</span>
                        <p class="font-semibold">{{ $pendaftar->email ?? '-' }}</p>
                    </div>
                    <div class="mb-3">
                        <span class="text-sm text-gray-500">Nama Lengkap:</span>
                        <p class="font-semibold">{{ $pendaftar->nama_lengkap ?? '-' }}</p>
                    </div>
                    <div class="mb-3">
                        <span class="text-sm text-gray-500">Asal Instansi:</span>
                        <p class="font-semibold">{{ $pendaftar->asal_instansi ?? '-' }}</p>
                    </div>
                    <div class="mb-3">
                        <span class="text-sm text-gray-500">Usia:</span>
                        <p class="font-semibold">
                            {{ optional($pendaftar)->date_of_birth ? \Carbon\Carbon::parse($pendaftar->date_of_birth)->age : '-' }}
                        </p>
                    </div>
                    <div class="mb-3">
                        <span class="text-sm text-gray-500">No Telepon:</span>
                        <p class="font-semibold">{{ $pendaftar->no_telepon ?? '-' }}</p>
                    </div>
                    <div class="mb-3">
                        <span class="text-sm text-gray-500">Riwayat Penyakit:</span>
                        <p class="font-semibold">{{ $pendaftar->riwayat_penyakit ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- align right -->
            <div class="relative border border-gray-300 rounded-3xl p-6 flex flex-col items-center">
                <span class="absolute -top-3 left-3 bg-white px-5 text-base font-semibold">
                    Payment Proof
                </span>

                <!-- img -->
                <!-- YANG BARU -->
                <div class="w-[250px] h-auto mb-6">
                    @if ($pendaftaranEvent && $pendaftaranEvent->bukti_payment)
                        @php
                            $extension = pathinfo($pendaftaranEvent->bukti_payment, PATHINFO_EXTENSION);
                            $isPdf = strtolower($extension) === 'pdf';
                        @endphp
                        <img src="{{ asset('storage/' . $pendaftaranEvent->bukti_payment) }}" alt="Bukti Pembayaran"
                            class="w-full rounded shadow">
                    @else
                        <div class="flex items-center justify-center h-40 bg-gray-100 rounded">
                            <p class="text-sm text-gray-500">Belum ada bukti pembayaran</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
