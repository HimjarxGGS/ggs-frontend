@extends('member.layouts.app')

@section('title', 'Detail Pendaftaran')

@section('content')
<div class="container mx-auto px-4 py-6">

   <div class="pt-32">
     <h2 class="text-2xl font-bold mb-6 text-center md:text-left">
        Detail Pendaftaran
     </h2>
   </div>

   <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

       <!-- align left -->
       <div class="space-y-9">

           <!-- status -->
           <div class="relative border border-gray-300 rounded-3xl p-6 w-full md:w-1/2 mx-auto md:mx-0">
               <span class="absolute -top-3 left-3 bg-white px-5 text-base font-semibold">
                   Status
               </span>
               <p class="text-center md:text-left {{ $history->status == 'pending' ? 'text-yellow-600 font-bold' : 'text-green-600 font-bold' }}">
                   {{ ucfirst($history->status) }}
               </p>
           </div>

           <!-- event -->
           <div class="relative border border-gray-300 rounded-3xl p-6">
               <span class="absolute -top-3 left-3 bg-white px-5 text-base font-semibold">
                   Event
               </span>
               <p class="font-semibold text-palette-3">{{ $history->name }}</p>
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
                       {{ optional($pendaftar)->date_of_birth 
                           ? \Carbon\Carbon::parse($pendaftar->date_of_birth)->age 
                           : '-' }}
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
           <div class="w-[250px] h-auto mb-6">
               <img src="{{ asset('images/bukti-transaksi.png') }}" 
                    alt="Bukti Pembayaran" 
                    class="w-full rounded shadow">
           </div>
       </div>
   </div>

   <!-- contact pers -->
        <div class="flex flex-col md:flex-row gap-3 mt-6 md:justify-center">
            <a href="" target="_blank"
            class="px-6 md:px-20 py-2 border border-palette-2 text-palette-4 rounded-3xl 
                    hover:bg-green-50 font-medium text-center transition ease-in-out duration-200">
                Contact Person 1
            </a>

            <a href="" target="_blank"
            class="px-6 md:px-20 py-2 border border-palette-2 text-palette-4 rounded-3xl
                    hover:bg-green-50 font-medium text-center transition ease-in-out duration-200">
                Contact Person 2
            </a>
        </div>
</div>
@endsection
