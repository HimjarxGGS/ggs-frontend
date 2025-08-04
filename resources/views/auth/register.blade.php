<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="icon" type="x-icon" href="{{ asset('images/Logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>

<body class="bg-white min-h-screen flex flex-col justify-between px-4 py-6">

  <!-- header -->
  <div class="text-center">
    <h1 class="text-xl font-bold text-slate-800">Green Comunition Surabaya</h1>
    <p class="text-sm text-slate-600 mt-1">Welcome to Register Page! Enter a valid data.</p>
  </div>

      <!-- daftar  -->
      <button class="w-full bg-[#9b5d3c] hover:bg-[#874c2c] text-white font-semibold py-2 rounded-md transition">Sign Up</button>

      <!--linked login -->
      <p class="text-sm text-slate-600 text-center">Already have account? <a href="{{ route('login') }}" class="text-[#9b5d3c]">Sign in</a></p>
    </div>
  </div>

  <!-- footer -->
  <footer class="text-center text-xs text-slate-400 mt-10">
    powered by <br> greencomunitionsurabaya & himse.telkomsurabaya
  </footer>

</body>
</html>
