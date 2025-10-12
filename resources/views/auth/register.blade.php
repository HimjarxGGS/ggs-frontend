<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registrasi</title>
    <link rel="icon" type="x-icon" href="{{ asset('images/Logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white min-h-screen flex flex-col justify-between px-4 py-6">

    <!-- header -->
    <div class="text-center mt-5 px-4">
        <h1 class="text-2xl md:text-3xl font-bold text-slate-800">Green Generation Surabaya</h1>
        <p class="text-xs md:text-sm text-slate-600">
            Welcome to Register Page! Enter valid data.
        </p>
    </div>

    <!-- content -->
    <div
        class="flex flex-col md:flex-row items-center justify-center md:justify-between md:gap-0 gap-12 mt-12 flex-grow px-4">

        <!-- image -->
        <div class="flex justify-center md:justify-center w-full md:w-1/2 mt-5">
            <img src="{{ asset('images/signup.svg') }}" alt="Regist Illustration" class="w-64 md:w-72" />
        </div>

        <!-- form -->
        <form action="{{ route('register') }}" method="POST" class="w-full max-w-sm space-y-4 mx-auto">
            @csrf

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative">
                    {{ session('success') }}
                </div>
            @endif

            <!-- @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative">
          <ul class="list-disc pl-4 text-sm">
            @foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
          </ul>
        </div>
      @endif -->

            <div>
                <h2 class="text-xl font-bold text-slate-800 text-left">Register Page</h2>
                <p class="text-xs text-slate-600 text-left">Masukkan data valid anda!</p>
            </div>


             <div class="w-full space-y-1 pt-5">
                <label for="email" class="text-sm text-slate-800 font-semibold">
                    Email
                </label>
                <input id="email" name="email" placeholder="Masukkan Email valid." type="text"
                    value="{{ old('email') }}"
                    class="w-full border text-sm rounded-3xl py-2 px-2.5 shadow-sm 
                 @error('notelfon') border-red-500 @else border-slate-200 @enderror
                 focus:border-slate-800 focus:outline-none pl-7" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- No.Telepon -->
            <div class="w-full space-y-1 pt-5">
                <label for="notelfon" class="text-sm text-slate-800 font-semibold">
                    No.Telepon
                </label>
                <input id="notelfon" name="notelfon" placeholder="Masukkan No.Telepon valid." type="text"
                    value="{{ old('notelfon') }}"
                    class="w-full border text-sm rounded-3xl py-2 px-2.5 shadow-sm 
                 @error('notelfon') border-red-500 @else border-slate-200 @enderror
                 focus:border-slate-800 focus:outline-none pl-7" />
                @error('notelfon')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Username -->
            <div class="w-full space-y-1">
                <label for="username" class="text-sm text-slate-800 font-semibold">
                    Username
                </label>
                <input id="username" name="username" placeholder="Masukkan username anda." type="text"
                    value="{{ old('username') }}"
                    class="w-full border text-sm rounded-3xl py-2 px-2.5 shadow-sm 
                 @error('username') border-red-500 @else border-slate-200 @enderror
                 focus:border-slate-800 focus:outline-none pl-7" />
                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="w-full space-y-1">
                <label for="password" class="text-sm text-slate-800 font-semibold">
                    Password
                </label>
                <input id="password" name="password" placeholder="Masukkan password anda." type="password"
                    class="w-full border text-sm rounded-3xl py-2 px-2.5 shadow-sm 
                 @error('password') border-red-500 @else border-slate-200 @enderror
                 focus:border-slate-800 focus:outline-none pl-7" />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full bg-[#9b5d3c] hover:bg-[#874c2c] text-white font-semibold py-2 rounded-3xl transition">
                Registrasi
            </button>

            <!-- Link ke login -->
            <p class="text-sm text-slate-600 text-center">
                Memiliki akun member? <a href="{{ route('login') }}" class="text-[#9b5d3c]">Login</a>
            </p>
        </form>
    </div>

    <!-- footer -->
    <footer class="text-center text-xs text-slate-400 mt-10">
        powered by <br> greencomunitionsurabaya & himse.telkomsurabaya
    </footer>

</body>

</html>
