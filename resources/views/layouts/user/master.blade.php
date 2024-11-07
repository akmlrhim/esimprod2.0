<!DOCTYPE html>
<html lang="en">

<head>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('fa/css/all.min.css') }}">
    <link
      rel="https://cdn.rawgit.com/mfd/f3d96ec7f0e8f034cc22ea73b3797b59/raw/856f1dbb8d807aabceb80b6d4f94b464df461b3e/gotham.css">
    <link href="https://db.onlinewebfonts.com/c/7dd5f4bf5d38875ca1822a830b6e6fe4?family=Aptos" rel="stylesheet">
    <title>@yield('title', 'Default Title')</title>
  </head>
</head>

<body class="bg-gray-50 dark:bg-neutral-900 flex flex-col min-h-screen">

  @include('layouts.user.partials.navbar')

  {{-- main content  --}}
  <div class="p-5 mt-12 bg-indigo-50">

    @yield('content')

  </div>

  @include('layouts.user.partials.footer')

</body>

</html>