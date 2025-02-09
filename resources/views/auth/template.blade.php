<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- <link href="https://fonts.cdnfonts.com/css/avenir" rel="stylesheet"> --}}
  <link
    rel="https://cdn.rawgit.com/mfd/f3d96ec7f0e8f034cc22ea73b3797b59/raw/856f1dbb8d807aabceb80b6d4f94b464df461b3e/gotham.css">

  <link rel="stylesheet" href="{{ asset('css/output.css') }}">

  <link rel="shortcut icon" href="{{ asset('img/assets/esimprod_logo_bg.png') }}" type="image/x-icon">
  <title>ESIMPR0D - Password</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-hidden bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700">

  @include('auth.validation')

  @yield('content')

  @yield('scripts')

  <script>
    setTimeout(() => {
      const toast = document.getElementById('toast-message');
      if (toast) {
        toast.style.display = 'none';
      }
    }, 3000);
  </script>
</body>

</html>
