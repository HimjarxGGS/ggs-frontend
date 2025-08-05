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
  <div class="text-center mt-5 px-4">
    <h1 class="text-2xl md:text-3xl font-bold text-slate-800">Green Generation Surabaya</h1>
    <p class="text-xs md:text-sm text-slate-600">Welcome to Login Page! Enter a valid data.</p>
  </div>

  <!-- content -->
  <div class="flex flex-col md:flex-row items-center justify-center md:justify-between md:gap-0 gap-16 mt-8 flex-grow px-4">

    <!-- image -->
    <div class="flex justify-center md:justify-center w-full md:w-1/2 mt-5">
      <img src="{{ asset('images/login.svg') }}" alt="Login Illustration" class="w-64 md:w-72" />
    </div>

    <!-- form -->
    <form action="{{ route('login') }}" method="POST" class="w-full max-w-sm space-y-4 mx-auto">
      @csrf
      <div>
        <h2 class="text-xl font-bold text-slate-800 text-left">Login Page</h2>
        <p class="text-xs text-slate-600 text-left">Jika pernah mendaftar member, Masukkan data valid anda!</p>
      </div>

      <!-- username -->
      <div class="w-full space-y-1 pt-5">
        <label for="username" class="font-sans antialiased text-sm text-slate-800 font-semibold">
          Username
        </label>
        <div class="relative w-full">
          <input 
            id="username" 
            name="username"
            placeholder="Masukkan username yang terdaftar!" 
            type="text" 
            required
            class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-slate-800 placeholder:text-slate-600/60 bg-transparent ring-transparent border border-slate-200 transition-all duration-300 ease-in disabled:opacity-50 disabled:pointer-events-none data-[error=true]:border-red-500 data-[success=true]:border-green-500 text-sm rounded-md py-2 px-2.5 ring shadow-sm hover:border-slate-800 hover:ring-slate-800/10 focus:border-slate-800 focus:ring-slate-800/10 peer" 
            data-error="false" 
            data-success="false" 
          />
        </div>
      </div>

      <!-- password -->
      <div class="w-full space-y-1">
        <label for="password" class="font-sans antialiased text-sm text-slate-800 font-semibold">
          Password
        </label>
        <div class="relative w-full">
          <input 
            id="password" 
            name="password"
            placeholder="Masukkan password yang terdaftar!" 
            type="password" 
            required
            class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-slate-800 placeholder:text-slate-600/60 bg-transparent ring-transparent border border-slate-200 transition-all duration-300 ease-in disabled:opacity-50 disabled:pointer-events-none data-[error=true]:border-red-500 data-[success=true]:border-green-500 text-sm rounded-md py-2 px-2.5 ring shadow-sm hover:border-slate-800 hover:ring-slate-800/10 focus:border-slate-800 focus:ring-slate-800/10 peer" 
            data-error="false" 
            data-success="false" 
          />
        </div>
      </div>

      <!-- login -->
      <button type="submit" class="w-full bg-[#9b5d3c] hover:bg-[#874c2c] text-white font-semibold py-2 rounded-md transition mt-10">
        Login
      </button>

      <!-- Link to Register -->
      <p class="text-sm text-slate-600 text-center">
        Tidak memiliki akun? <a href="{{ route('register') }}" class="text-[#9b5d3c]">Daftar Akun</a>
      </p>
    </form>
  </div>

  <!-- footer -->
  <footer class="text-center text-xs text-slate-400 mt-10">
    powered by <br> greencomunitionsurabaya & himse.telkomsurabaya
  </footer>

</body>
</html>
