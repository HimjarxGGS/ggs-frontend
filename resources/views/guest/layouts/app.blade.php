<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Default Title')</title>
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
    <!-- navbar -->
    @include('guest.components.navbar')
    <div class="mt-20">
        @if (session('success'))
            <div
                class="max-w-lg mx-auto mt-4 px-4 py-3 rounded-lg bg-green-700 text-white shadow-md flex justify-between items-center">
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="font-bold ml-4">×</button>
            </div>
        @endif

        @if (session('error'))
            <div
                class="max-w-lg mx-auto mt-4 px-4 py-3 rounded-lg bg-red-700 text-white shadow-md flex justify-between items-center">
                <span>{{ session('error') }}</span>
                <button onclick="this.parentElement.remove()" class="font-bold ml-4">×</button>
            </div>
        @endif

        @if (session('info'))
            <div
                class="max-w-lg mx-auto mt-4 px-4 py-3 rounded-lg bg-blue-700 text-white shadow-md flex justify-between items-center">
                <span>{{ session('info') }}</span>
                <button onclick="this.parentElement.remove()" class="font-bold ml-4">×</button>
            </div>
        @endif

    </div>


    <!-- content  -->
    @yield('content')

    <!-- footer -->
    @include('components.footer')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
