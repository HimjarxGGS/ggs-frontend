<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Success</title>
    <link rel="icon" type="x-icon" href="{{ asset('images/Logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Geist+Mono:wght@100..900&family=Geist:wght@100..900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('member.components.navbar')
    <section class="md:mt-60 mt-20">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center text-center md:text-left">

                <div class="flex justify-center" data-aos="zoom-in-right" data-aos-anchor="#example-anchor"
                    data-aos-offset="500" data-aos-duration="500">
                    <img src="{{ asset('images/success.png') }}" alt="Success Illustration"
                        class="max-w-sm w-full h-auto">
                </div>

                <div>
                    {{-- ✅ Pesan Success dari Session --}}
                    @if (session('success'))
                        <div class="text-green-600 font-semibold text-center mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Judul -->
                    <h2 class="text-xl md:text-3xl font-bold text-gray-900 mb-2">
                        Congrats! Data Behasil Disimpan.
                    </h2>
                    <!-- Sub text -->
                    <p class="text-gray-600 text-xs md:text-sm mb-6">
                        Terima Kasih Sudah menyimpan Data Anda!
                    </p>

                    <!-- Button group -->
                    <div class="flex flex-col md:flex-row gap-3 md:gap-4 justify-center md:justify-start md:mt-0 mt-20">
                        <!-- Button Event -->
                        <!-- <a href="/event"
                            class="w-full md:w-52 px-6 py-3 rounded-full bg-[#A16446] text-white font-medium hover:bg-[#8b5339] transition text-sm md:text-base text-center">
                            Event Lainnya
                        </a> -->

                        <!-- Button Contact Person -->
                        <a href="https://wa.me/6281216132795"
                            class="w-full md:w-52 px-6 py-3 rounded-full border border-gray-300 flex items-center justify-center gap-2 text-gray-800 font-medium hover:bg-gray-100 transition text-sm md:text-base">
                            {{-- <img src="{{ asset('icons/contact.svg') }}" alt="Icon" class="w-4 h-4"> --}}
                            Contact Person
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>
