<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/Logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white min-h-screen flex flex-col justify-between px-4 py-6">

    <!-- header -->
    <header class="text-center mt-5 px-4">
        <h1 class="text-2xl md:text-3xl font-bold text-slate-800">
            Green Generation Surabaya
        </h1>
        <p class="text-xs md:text-sm text-slate-600">
            Welcome to Login Page! Enter valid data.
        </p>
    </header>

    <!-- content -->
    <main class="flex flex-col md:flex-row items-center justify-center md:justify-between gap-16 mt-8 flex-grow px-4">

        <!-- image -->
        <div class="flex justify-center w-full md:w-1/2 mt-5">
            <img src="{{ asset('images/login.svg') }}" alt="Login Illustration" class="w-64 md:w-72" />
        </div>

        <!-- form -->
        <form action="{{ route('login') }}" method="POST" class="w-full max-w-sm space-y-4 mx-auto">
            @csrf

            <!-- title form -->
            <div>
                <h2 class="text-xl font-bold text-slate-800">Login Page</h2>
                <p class="text-xs text-slate-600">Enter valid data</p>
            </div>

            <!-- error umum (misalnya kredensial salah) -->
            @if (session('error'))
                <div class="bg-red-100 text-red-700 px-3 py-2 rounded-md text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <!-- username -->
            <div class="w-full space-y-1 pt-5">
                <label for="username" class="block text-sm font-semibold text-slate-800 pl-2">
                    Username
                </label>
                <input id="username" name="username" value="{{ old('username') }}"
                    placeholder="Masukkan username yang terdaftar!" type="text"
                    class="w-full outline-none text-slate-800 placeholder:text-slate-600/60 bg-transparent border @error('username') border-red-500 @else border-slate-200 @enderror rounded-3xl py-2 px-2.5 shadow-sm hover:border-slate-800 focus:border-slate-800 focus:ring-1 focus:ring-slate-800 text-sm pl-5" />
                @error('username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- password -->
            <div class="w-full space-y-1">
                <label for="password" class="block text-sm font-semibold text-slate-800 pl-2">
                    Password
                </label>
                <input id="password" name="password" placeholder="Masukkan password yang terdaftar!" type="password"
                    class="w-full outline-none text-slate-800 placeholder:text-slate-600/60 bg-transparent border @error('password') border-red-500 @else border-slate-200 @enderror rounded-3xl py-2 px-2.5 shadow-sm hover:border-slate-800 focus:border-slate-800 focus:ring-1 focus:ring-slate-800 text-sm pl-5" />
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- login button -->
            <button type="submit"
                class="w-full bg-palette-3 hover:bg-[#874c2c] text-white font-semibold py-2 rounded-full transition duration-300 ease-in-out mt-10">
                Login
            </button>

            <!-- Link to Register -->
            <p class="text-sm text-slate-600 text-center">
                Tidak memiliki akun?
                <a href="{{ route('register') }}" class="text-palette-3 hover:underline">
                    Daftar Akun
                </a>
            </p>
        </form>
    </main>

    <!-- footer -->
    <footer class="text-center text-xs text-slate-400 mt-10">
        powered by <br> greengnrsby & himse.telkomsurabaya
    </footer>

</body>

</html>