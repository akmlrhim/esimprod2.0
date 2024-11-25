<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="https://db.onlinewebfonts.com/c/7dd5f4bf5d38875ca1822a830b6e6fe4?family=Aptos" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/output.css') }}">

  <link rel="shortcut icon" href="{{ asset('img/assets/esimprod_logo_bg.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('fa/css/all.min.css') }}">
  <title>ESIMPR0D - Password</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-hidden">

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
