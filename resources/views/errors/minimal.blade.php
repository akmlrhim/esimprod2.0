<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <link rel="stylesheet" href="{{ asset('css/output.css') }}">

  <link rel="shortcut icon" href="{{ asset('img/assets/esimprod_logo_bg.png') }}" type="image/x-icon">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>@yield('title')</title>
</head>

<body
  class="bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 min-h-screen flex items-center justify-center">

  <div class="py-8 px-6 mx-auto max-w-screen-xl lg:py-16 lg:px-8 font-sans">
    <div class="mx-auto max-w-screen-sm text-center">
      <div class="flex justify-center items-center mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-primary-600 dark:text-primary-500 animate-bounce"
          fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9.75 21.75L12 19.5m0 0l2.25 2.25M12 19.5V12m6.75 4.5H21M3 16.5h1.5m0-7.5H3m18 0h-1.5m-9 0h1.5m1.5 0h3" />
        </svg>
      </div>
      <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 dark:text-primary-500">
        @yield('code')
      </h1>
      <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Something's missing.
      </p>
      <p class="mb-6 text-lg font-light text-gray-500 dark:text-gray-400">
        @yield('message')
      </p>
      <a href="{{ url()->previous() }}"
        class="inline-flex items-center justify-center gap-x-2 text-white bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-3 text-center dark:focus:ring-indigo-800 transition-transform transform hover:scale-105">
        Back to Previous
      </a>
    </div>
  </div>

</body>

</html>
