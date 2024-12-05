<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
  >
  <meta
    http-equiv="X-UA-Compatible"
    content="ie=edge"
  >
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link
    rel="stylesheet"
    href="https://rsms.me/inter/inter.css"
  >
  <link
    rel="stylesheet"
    href="{{ asset('css/output.css') }}"
  >
  <link
    rel="shortcut icon"
    href="{{ asset('/favicon.ico') }}"
    type="image/x-icon"
  >
  <link
    rel="stylesheet"
    href="{{ asset('fa/css/all.min.css') }}"
  >

  <link
    href="https://db.onlinewebfonts.com/c/7dd5f4bf5d38875ca1822a830b6e6fe4?family=Aptos"
    rel="stylesheet"
  >
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <title>@yield('title', 'Default Title')</title>
</head>

<body class="bg-gray-50 dark:bg-neutral-900 flex flex-col min-h-screen">

  @include('layouts.user.partials.navbar')

  {{-- Main content --}}
  <div class="p-5 mt-12 bg-indigo-50">
    @yield('content')
  </div>

  @include('layouts.user.partials.footer')

  <!-- Flowbite JS CDN -->
</body>

</html>
