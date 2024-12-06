<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{ asset('css/output.css') }}">

  <link href="https://fonts.cdnfonts.com/css/avenir" rel="stylesheet">
  <link rel="shortcut icon" href="{{ asset('img/assets/esimprod_logo_bg.png') }}" type="image/x-icon">

  @notifyCss
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <title>ESIMPROD | {{ $title }}</title>
</head>

<body class="bg-gray-50 dark:bg-neutral-900">


  @include('layouts.admin.partials.navbar')

  @include('layouts.admin.partials.validation')

  @include('layouts.admin.partials.sidebar')

  <div class="p-4 sm:ml-64 font-sans">
    @include('layouts.admin.partials.breadcrumb')
    @yield('content')
    <x-notify::notify />
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
