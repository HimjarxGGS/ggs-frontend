<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Default Title')</title>
    <link rel="icon" type="x-icon" href="{{ asset('images/Logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>
<body>
<!-- navbar -->
  @include('components.navbar')

<!-- content  -->
  @yield('content')

<!-- footer -->
  @include('components.footer')
</body>
</html>