<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="theme-color" content="#1E3164">


  <link href="https://fonts.cdnfonts.com/css/avenir" rel="stylesheet">



  <link rel="shortcut icon" href="{{ asset('img/assets/esimprod_logo_bg.png') }}" type="image/x-icon">
  <x-head.tinymce-config />

  @notifyCss
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>ESIMPROD | {{ $title }}</title>
</head>

<body class="bg-gray-50 dark:bg-neutral-900 antialiased">


  @include('layouts.admin.partials.navbar')

  @include('layouts.admin.partials.validation')

  @include('layouts.admin.partials.sidebar')

  <div class="p-4 sm:ml-64 font-sans">
    @include('layouts.admin.partials.breadcrumb')
    @yield('content')


    <div class="absolute top-0 left-0 right-0 z-50">
      <x-notify::notify />
    </div>

    @notifyJs
  </div>

  @yield('scripts')

  <script>
    setTimeout(() => {
      const toast = document.getElementById('toast-message');
      if (toast) {
        toast.style.display = 'none';
      }
    }, 6000);
  </script>


</body>


</html>
