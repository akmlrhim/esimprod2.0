<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">

  <link href="https://fonts.cdnfonts.com/css/avenir" rel="stylesheet">
  {{-- <link
    rel="https://cdn.rawgit.com/mfd/f3d96ec7f0e8f034cc22ea73b3797b59/raw/856f1dbb8d807aabceb80b6d4f94b464df461b3e/gotham.css"> --}}

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>@yield('title', 'Default Title')</title>
</head>

<body class="bg-gray-50 dark:bg-neutral-900 flex flex-col min-h-screen">

  @include('layouts.user.partials.navbar')

  <div class="p-5 mt-12">
    @yield('content')
  </div>

  @include('layouts.user.partials.footer')

</body>

</html>
