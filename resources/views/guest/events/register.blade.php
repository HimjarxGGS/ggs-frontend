@extends('guest.layouts.app')

@section('title', 'Registrasi Event - ' . $event->name)

@section('content')
<div class="max-w-6xl mx-auto px-4">
    <!-- section header start -->
    <section class="mb-8 text-center md:text-left pt-32">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
            {{ $event->name }}
        </h1>
        <p class="text-gray-600 text-sm md:text-base">Green Generation Surabaya</p>
        <span class="inline-block mt-3 text-xs md:text-sm font-semibold px-10 py-1 rounded-full bg-green-500 text-white">
            {{ ucfirst($event->status) }}
        </span>
    </section>

    <!-- section registrasi start -->
    <section class="my-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">

            <!-- poster event -->
            <div class="bg-transparent">
                <img src="{{ $event->poster ? asset('storage/' . $event->poster) : asset('images/posterggs.png') }}"
                    alt="Poster Event {{ $event->name }}"
                    class="w-full h-auto max-h-[600px] object-contain rounded-lg bg-transparent">
            </div>

            <!-- form registrasi -->
            <div class="space-y-5">
                <!-- Info Event -->
                <div class="space-y-4 mb-6">
                    <div class="p-4 border rounded-xl shadow-md bg-white text-sm ring-1 ring-palette-1 space-y-3">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('icons/calender.svg') }}" alt="Calendar" class="w-5 h-5">
                            <div>
                                <h3 class="text-gray-500">Jadwal Event</h3>
                                <p class="text-lg text-black font-semibold">
                                    {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}
                                </p>
                            </div>
                        </div>
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
                </div>

                <form action="{{ route('guest.register') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">

                    <!-- email -->
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ml-4">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter valid Email" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-palette-2 focus:border-palette-2 block w-full justify-center p-2.5 transition ease-in-out duration-300 pl-5">
                    </div>

                    <!-- nama -->
                    <div class="mb-4">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ml-4">Nama
                            Lengkap</label>
                        <input type="text" id="nama" name="nama_lengkap" placeholder="Enter your name" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-palette-2 focus:border-palette-2 block w-full p-2.5 transition ease-in-out duration-300 pl-5">
                    </div>

                    <!-- asal instansi -->
                    <div class="mb-4">
                        <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 ml-4">Asal
                            Instansi</label>
                        <input type="text" id="instansi" name="asal_instansi" placeholder="Enter your institution"
                            required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-palette-2 focus:border-palette-2 block w-full p-2.5 transition ease-in-out duration-300 pl-5">
                    </div>

                    <!-- tanggal lahir -->
                    <div class="mb-4">
                        <label for="date_of_birth" class="block mb-2 text-sm font-medium text-gray-900 ml-4">
                            Tanggal Lahir </label>
                        <input type="date" id="date_of_birth" name="date_of_birth" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-palette-2 focus:border-palette-2 block w-full p-2.5 transition ease-in-out duration-300 pl-5">

                        @error('date_of_birth')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>



                    <!-- telepon -->
                    <div class="mb-4">
                        <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900 ml-4">No.
                            Telepon</label>
                        <input type="text" id="telepon" name="no_telepon" placeholder="Enter your phone number"
                            required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-palette-2 focus:border-palette-2 block w-full p-2.5 transition ease-in-out duration-300 pl-5">
                        @error('no_telepon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- riwayat penyakit -->
                    <div class="mb-4">
                        <label for="penyakit" class="block mb-2 text-sm font-medium text-gray-900 ml-4">Riwayat
                            Penyakit</label>
                        <input type="text" id="penyakit" name="riwayat_penyakit" placeholder="Optional"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-palette-2 focus:border-palette-2 block w-full p-2.5 transition ease-in-out duration-300 pl-5">
                    </div>

                    <!-- bukti share poster -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2 ml-4">
                            Bukti Share Poster
                        </label>

                        <div id="dropPoster" class="flex items-center justify-center w-full">
                            <label for="poster"
                                class="flex flex-col items-center justify-center w-full h-52 md:h-32 
            border-2 border-gray-300 border-dashed rounded-3xl cursor-pointer 
            bg-gray-50 hover:bg-gray-300 transition ease-in-out duration-300">

                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5
                        5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5
                        5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>

                                    <p id="posterText" class="mb-2 text-sm text-gray-500">
                                        <span class="font-semibold text-palette-2">Click to upload</span> or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500">PNG or JPG</p>
                                </div>

                                <input id="poster" name="bukti_share" type="file" class="hidden" required />
                            </label>
                        </div>
                    </div>

                    <!-- <div>
                        <label   class="block text-sm font-medium text-gray-700 mb-2 ml-4">Bukti Share Poster</label>
                        <div id="dropPoster" class="flex items-center justify-center w-full">
                            <label for="poster"
                                class="flex flex-col items-center justify-center w-full h-52 md:h-32 border-2 border-gray-300 border-dashed rounded-3xl cursor-pointer bg-gray-50 hover:bg-gray-300 transition ease-in-out duration-300">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5
                                5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5
                                5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p id="posterText" class="mb-2 text-sm text-gray-500"><span
                                            class="font-semibold text-palette-2">Click to upload</span> or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500">PNG or JPG</p>
                                </div>
                                <input id="poster" name="bukti_share" type="file" class="hidden" required />
                            </label>
                        </div>
                    </div> -->


                    <!-- hadir -->
                    <div>
                        <p class="text-sm font-medium text-gray-700 mb-1 ml-4">Bersedia hadir pada hari H?</p>
                        <div class="flex items-center gap-4 ml-4">
                            <label class="flex items-center gap-1 cursor-pointer">
                                <input type="radio" name="kesediaan_hadir" value="1" checked required> Hadir
                            </label>
                            <label class="flex items-center gap-1 cursor-pointer">
                                <input type="radio" name="kesediaan_hadir" value="0" required> Tidak Hadir
                            </label>
                        </div>
                    </div>

                    <!-- tata tertib -->
                    <div>
                        <p class="text-sm font-medium text-gray-700 mb-1 ml-4">Bersedia mengikuti tata tertib?</p>
                        <div class="flex items-center gap-4 ml-4">
                            <label class="flex items-center gap-1 cursor-pointer">
                                <input type="radio" name="kesediaan_menaati_aturan" value="1" checked required> Ya
                            </label>
                            <label class="flex items-center gap-1 cursor-pointer">
                                <input type="radio" name="kesediaan_menaati_aturan" value="0" required> Tidak
                            </label>
                        </div>
                    </div>

                    <!-- pembayaran -->
                    <div>
                        <p class="text-sm font-medium text-gray-700 mb-1 ml-4">Pembayaran Melalui?</p>
                        <div class="ml-2">
                            <!-- BSI -->
                            <label class="flex items-center gap-2 p-2 cursor-pointer">
                                <input type="radio" name="opsi_payment" value="bsi" required> BSI
                                <span>BSI 726741218 a.n Nanda Aliefira</span>
                            </label>
                            <!-- OVO -->
                            <label class="flex items-center gap-2 p-2 cursor-pointer">
                                <input type="radio" name="opsi_payment" value="ovo" required> OVO
                                <span>OVO 085784246763 a.n Nanda Aliefira</span>
                            </label>
                            <!-- GOPAY -->
                            <label class="flex items-center gap-2 p-2 cursor-pointer">
                                <input type="radio" name="opsi_payment" value="gopay" required> GOPAY
                                <span>GOPAY 085784246763 a.n Nanda Aliefira</span>
                            </label>
                        </div>
                    </div>

                    <!-- bukti pembayaran -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2 ml-4">Bukti Pembayaran</label>
                        <div class="flex items-center justify-center w-full">
                            <label for="pembayaran"
                                class="flex flex-col items-center justify-center w-full h-52 md:h-32 border-2 border-gray-300 border-dashed rounded-3xl cursor-pointer bg-gray-50 hover:bg-gray-300 transition ease-in-out duration-300">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5
                                    5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5
                                    5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p id="bayarText" class="mb-2 text-sm text-gray-500"><span
                                            class="font-semibold text-palette-2">Click to upload</span> or drag and
                                        drop</p>
                                    <p class="text-xs text-gray-500">PNG or JPG</p>
                                </div>
                                <input id="pembayaran" name="bukti_payment" type="file" class="hidden" required />
                            </label>
                        </div>
                    </div>

                    <!-- upload foto -->
                    @if ($event->need_registrant_picture)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2 ml-4">Upload Foto</label>
                        <div class="flex items-center justify-center w-full">
                            <label for="foto"
                                class="flex flex-col items-center justify-center w-full h-52 md:h-32 border-2 border-gray-300 border-dashed rounded-3xl cursor-pointer bg-gray-50 hover:bg-gray-300 transition ease-in-out duration-300">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5
                                    5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5
                                    5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p id="fotoText" class="mb-2 text-sm text-gray-500"><span
                                            class="font-semibold text-palette-2">Click to upload</span> or drag and
                                        drop</p>
                                    <p class="text-xs text-gray-500">PNG or JPG</p>
                                </div>
                                <input id="foto" name="registrant_picture" type="file" class="hidden" required />
                            </label>
                        </div>
                    </div>
                    @endif

                    <!-- tombol registrasi -->
                    <button type="submit"
                        class="w-full bg-palette-5 text-white py-3 rounded-3xl font-semibold hover:bg-[#8b5339] transition duration-300">
                        Registrasi Event {{ $event->name }}
                    </button>
                </form>

                <p class="text-sm text-gray-600">
                    *Daftar Member supaya data tersimpan untuk event selanjutnya dan dapat melihat history pendaftaran!
                    <a href="{{ route('register') }}" class="text-palette-3 hover:underline"><b>Daftar disini</b></a>
                </p>
            </div>
        </div>
    </section>
</div>
@endsection