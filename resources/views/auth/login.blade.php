<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" type="x-icon" href="{{ asset('images/Logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>

<body class="bg-white min-h-screen flex flex-col justify-between px-4 py-6">

  <!-- header -->
  <div class="text-center mt-5">
    <h1 class="text-3xl font-bold text-slate-800">Green Generation Surabaya</h1>
    <p class="text-sm text-slate-600">Welcome to Login Page! Enter a valid data.</p>
  </div>

  <!-- content -->
  <div class="flex flex-col md:flex-row items-center justify-center gap-72 mt-8 flex-grow">
    <!-- image -->
    <div class="max-w-xs md:max-w-sm">
      <img src="{{ asset('images/login.svg') }}" alt="Login Illustration" class="w-72">
    </div>

    <!-- form -->
    <form action="{{ route('login') }}" method="POST" class="w-full max-w-sm space-y-4">
      @csrf
      <div>
        <h2 class="text-xl font-bold text-slate-800">Login Page</h2>
        <p class="text-xs text-slate-600">Jika pernah mendaftar member, Masukkan data valid anda!</p>
      </div>

      <!-- username -->
      <!-- <div class="relative">
        <input
          class="peer w-full bg-transparent placeholder-transparent text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 focus:outline-none focus:border-slate-400 hover:border-slate-300"
          placeholder="Username" type="text" id="username" name="username" required />
        <label for="username"
          class="absolute bg-white px-1 left-2.5 top-2.5 text-slate-400 text-sm transition-all peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-sm peer-focus:-top-2 peer-focus:text-xs peer-focus:text-slate-400 peer-focus:scale-90">
            Username/Email
        </label>
      </div> -->
      <div class="relative">
        <input
          class="peer w-full bg-transparent placeholder-transparent text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
          placeholder="No. Telepon" type="text" id="phone" />
        <label for="phone"
          class="absolute bg-white px-1 left-2.5 top-2.5 text-slate-400 text-sm transition-all peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-sm peer-focus:-top-2 peer-focus:text-xs peer-focus:text-slate-400 peer-focus:scale-90">
          No. Telepon
        </label>
      </div>

      <!-- pass -->
      <div class="relative">
        <input
          class="peer w-full bg-transparent placeholder-transparent text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
          placeholder="Password" type="password" id="password" name="password" required />
        <label for="password"
          class="absolute bg-white px-1 left-2.5 top-2.5 text-slate-400 text-sm transition-all peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-sm peer-focus:-top-2 peer-focus:text-xs peer-focus:text-slate-400 peer-focus:scale-90">
            Password
        </label>
      </div>

      <!-- login -->
      <button type="submit" class="w-full bg-[#9b5d3c] hover:bg-[#874c2c] text-white font-semibold py-2 rounded-md transition mt-4">
        Login
      </button>

      <!-- Link to Register -->
      <p class="text-sm text-slate-600 text-center">
        Tidak memiliki akun? <a href="{{ route('register') }}" class="text-[#9b5d3c]">Daftar Akun</a>
      </p>
    </form>
  </div>

  <!-- Footer -->
  <footer class="text-center text-xs text-slate-400 mt-10">
    powered by <br> greencomunitionsurabaya & himse.telkomsurabaya
  </footer>

</body>
</html>
