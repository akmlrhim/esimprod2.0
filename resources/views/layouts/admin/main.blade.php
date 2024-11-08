<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  @notifyCss

  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="stylesheet" href="{{ asset('css/output.css') }}">
  <link rel="shortcut icon" href="{{ asset('img/assets/esimprod_logo_bg.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('fa/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/loader.css') }}">
  <link
    rel="https://cdn.rawgit.com/mfd/f3d96ec7f0e8f034cc22ea73b3797b59/raw/856f1dbb8d807aabceb80b6d4f94b464df461b3e/gotham.css">
  <link href="https://db.onlinewebfonts.com/c/7dd5f4bf5d38875ca1822a830b6e6fe4?family=Aptos" rel="stylesheet">
  <title>ESIMPROD | {{ $title }}</title>
</head>


<body class="bg-gray-50 dark:bg-neutral-900">


  @include('layouts.admin.partials.navbar')

  @include('layouts.admin.partials.sidebar')

  <div class="p-4 sm:ml-64 font-sans" id="primary-content">
    @include('layouts.admin.partials.breadcrumb')
    @yield('content')
    <x-notify::notify />
    @notifyJs
  </div>

  .
  {{-- animasi loading --}}
  <div class="flex justify-center items-center h-screen w-screen fixed top-0 left-0 bg-white z-50 pointer-events-none"
    id="loader">
    <div class="relative inline-flex">
      <div class="w-8 h-8 bg-blue-500 rounded-full"></div>
      <div class="w-8 h-8 bg-blue-500 rounded-full absolute top-0 left-0 animate-ping"></div>
      <div class="w-8 h-8 bg-blue-500 rounded-full absolute top-0 left-0 animate-pulse"></div>
    </div>
  </div>

  @yield('scripts')

  <script>
    setTimeout(function() {
      const loader = document.getElementById("loader");
      loader.style.opacity = "0";

      loader.addEventListener("transitionend", function() {
        loader.style.display = "none";
      });
    }, 1000);
  </script>

</body>

</html>
