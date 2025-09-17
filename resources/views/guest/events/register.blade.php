<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Event</title>
    <link rel="icon" type="x-icon" href="{{ asset('images/Logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist+Mono:wght@100..900&family=Geist:wght@100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>

<body>
    <div class="max-w-6xl mx-auto px-4 mt-28">

        <!-- section header start -->
        <section class="mb-8 text-left md:text-left md:pl-10 pl-3">
            <!-- judul -->
            <h1 class="text-xl md:text-3xl font-bold text-gray-800">
                Volunteer Greenovation Batch 2
            </h1>

            <!-- penerbit -->
            <p class="text-gray-600 text-sm md:text-base">Green Generation Surabaya</p>

            <!-- status -->
            <span class="inline-block mt-3 bg-green-500 text-white text-xs md:text-sm font-semibold px-10 py-1 rounded-full">
                Active
            </span>
        </section>
        <!-- section header end -->

        <!-- section registrasi start -->
        <section class="my-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">

                <!-- poster event -->
                <div>
                    <img src="{{ asset('images/posterggs.png') }}" 
                        alt="Poster Event" 
                        class="w-full h-auto max-h-[600px] object-contain" id="">
                </div>

                <!-- form registrasi -->
                <div class="space-y-5">
                    <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf

                        <!-- email -->
                        <div class="mb-4">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ml-4">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter valid Email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-palette-2 focus:border-palette-2 block w-full justify-center p-2.5 transition ease-in-out duration-300 pl-5">
                        </div>

                        <!-- nama -->
                        <div class="mb-4">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ml-4">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" placeholder="Enter your name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-palette-2 focus:border-palette-2 block w-full p-2.5 transition ease-in-out duration-300 pl-5">
                        </div>

                        <!-- asal instansi -->
                        <div class="mb-4">
                            <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 ml-4">Asal Instansi</label>
                            <input type="text" id="instansi" name="instansi" placeholder="Enter your institution"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-palette-2 focus:border-palette-2 block w-full p-2.5 transition ease-in-out duration-300 pl-5">
                        </div>

                        <!-- usia -->
                        <div class="mb-4">
                            <label for="usia" class="block mb-2 text-sm font-medium text-gray-900p ml-4">Usia</label>
                            <input type="number" id="usia" name="usia" placeholder="Enter your age"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-palette-2 focus:border-palette-2 block w-full p-2.5 transition ease-in-out duration-300 pl-5">
                        </div>

                        <!-- telepon -->
                        <div class="mb-4">
                            <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900 ml-4">No. Telepon</label>
                            <input type="text" id="telepon" name="telepon" placeholder="Enter your phone number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-palette-2 focus:border-palette-2 block w-full p-2.5 transition ease-in-out duration-300 pl-5">
                        </div>
                        
                        <!-- riwayat penyakit -->
                        <div class="mb-4">
                            <label for="penyakit" class="block mb-2 text-sm font-medium text-gray-900 ml-4">Riwayat Penyakit</label>
                            <input type="text" id="penyakit" name="penyakit" placeholder="Optional"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-palette-2 focus:border-palette-2 block w-full p-2.5 transition ease-in-out duration-300 pl-5">
                        </div>

                        <!-- form untuk guest dimulai dari sini -->
                        <!-- bukti share poster -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2 ml-4">Bukti Share Poster</label>
                            <div id="dropPoster" class="flex items-center justify-center w-full">
                                <label for="poster" class="flex flex-col items-center justify-center w-full h-52 md:h-32 border-2 border-gray-300 border-dashed rounded-3xl cursor-pointer bg-gray-50 hover:bg-gray-300 transition ease-in-out duration-300">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 
                                                5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 
                                                5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold text-palette-2">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500">PNG or JPG</p>
                                    </div>
                                    <input id="poster" name="poster" type="file" class="hidden" />
                                </label>
                            </div>
                        </div>

                        <!-- bukti pembayaran -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2 ml-4">Bukti Pembayaran</label>
                            <div class="flex items-center justify-center w-full">
                                <label for="pembayaran" class="flex flex-col items-center justify-center w-full h-52 md:h-32 border-2 border-gray-300 border-dashed rounded-3xl cursor-pointer bg-gray-50 hover:bg-gray-300 transition ease-in-out duration-300">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 
                                                5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 
                                                5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold text-palette-2">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500">PNG or JPG</p>
                                    </div>
                                    <input id="pembayaran" name="pembayaran" type="file" class="hidden" />
                                </label>
                            </div>
                        </div>

                        <!-- ini member gausa upload foto -->
                        <!-- upload foto -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2 ml-4">Upload Foto</label>
                            <div class="flex items-center justify-center w-full">
                                <label for="foto" class="flex flex-col items-center justify-center w-full h-52 md:h-32 border-2 border-gray-300 border-dashed rounded-3xl cursor-pointer bg-gray-50 hover:bg-gray-300 transition ease-in-out duration-300">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 
                                                5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 
                                                5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold text-palette-2">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500">PNG or JPG</p>
                                    </div>
                                    <input id="foto" name="foto" type="file" class="hidden" />
                                </label>
                            </div>
                        </div>

                        <!-- hadir -->
                        <div>
                            <p class="text-sm font-medium text-gray-700 mb-1 ml-4">Bersedia hadir pada hari H?</p>
                            <div class="flex items-center gap-4 ml-4">
                                <label class="flex items-center gap-1 cursor-pointer">
                                    <input type="radio" name="hadir" value="ya" checked>
                                    Hadir
                                </label>
                                <label class="flex items-center gap-1 cursor-pointer">
                                    <input type="radio" name="hadir" value="tidak">
                                    Tidak Hadir
                                </label>
                            </div>
                        </div>

                        <!-- tata tertib -->
                        <div>
                            <p class="text-sm font-medium text-gray-700 mb-1 ml-4">Bersedia mengikuti tata tertib?</p>
                            <div class="flex items-center gap-4 ml-4">
                                <label class="flex items-center gap-1 cursor-pointer">
                                    <input type="radio" name="tata_tertib" value="ya" checked>
                                    Ya, Saya Bersedia
                                </label>
                                <label class="flex items-center gap-1 cursor-pointer">
                                    <input type="radio" name="tata_tertib" value="tidak">
                                    Tidak
                                </label>
                            </div>
                        </div>

                        <!-- pembayaran -->
                        <div>
                            <p class="text-sm font-medium text-gray-700 mb-1 ml-4">Pembayaran Melalui?</p>
                            <div class="ml-2">
                                <!-- BSI -->
                                <label class="flex items-center gap-2 p-2 cursor-pointer">
                                    <input type="radio" name="pembayaran_via" value="bsi">
                                    <span>BSI 726741218 a.n Nanda Aliefira</span>
                                </label>
                                <!-- OVO -->
                                <label class="flex items-center gap-2 p-2 cursor-pointer">
                                    <input type="radio" name="pembayaran_via" value="ovo">
                                    <span>OVO 085784246763 a.n Nanda Aliefira</span>
                                </label>
                                <!-- GOPAY -->
                                <label class="flex items-center gap-2 p-2 cursor-pointer">
                                    <input type="radio" name="pembayaran_via" value="gopay">
                                    <span>GOPAY 085784246763 a.n Nanda Aliefira</span>
                                </label>
                            </div>
                        </div>

                        <!-- tombol registrasi -->
                        <button type="submit" 
                                class="w-full bg-palette-5 text-white py-3 rounded-3xl font-semibold hover:bg-brown-600 transition duration-300 hover:bg-[#8b5339]">
                            Registrasi Event
                        </button>
                    </form>

                    <p class="text-sm text-gray-600">
                        *Daftar Member supaya data tersimpan untuk event selanjutnya dan dapat melihat history pendaftaran!  
                        <a href="/register" class="text-blue-500 hover:underline">Daftar disini</a>
                    </p>

                    <a href="https://wa.me/628123456789" 
                    class="block text-center bg-gray-200 text-gray-800 rounded-3xl py-3 hover:bg-gray-300 transition">
                    Contact Person
                    </a>
                </div>
            </div>
        </section>
        <!-- section registrasi end -->
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</html>
