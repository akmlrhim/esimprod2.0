<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>ESIMPROD - Login</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <link rel="shortcut icon" href="{{ asset('img/assets/esimprod_logo_bg.png') }}" type="image/x-icon">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://db.onlinewebfonts.com/c/7dd5f4bf5d38875ca1822a830b6e6fe4?family=Aptos" rel="stylesheet">
</head>

<body>

  @if (session('success') || session('status') || session('error'))
    <div id="toast-message"
      class="fixed top-5 right-5 z-50 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
      role="alert">
      <div
        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 
		{{ session('success')
      ? 'text-green-500 bg-green-100 dark:bg-green-800 dark:text-green-200'
      : (session('status')
          ? 'text-yellow-500 bg-yellow-100 dark:bg-yellow-800 dark:text-yellow-200'
          : 'text-red-500 bg-red-100 dark:bg-red-800 dark:text-red-200') }} 
		rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5" fill="currentColor"
          aria-hidden="true">
          <path
            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336l24 0 0-64-24 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l48 0c13.3 0 24 10.7 24 24l0 88 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
        </svg>
        <span class="sr-only">Icon</span>
      </div>
      <div class="ms-3 text-sm font-normal">
        {{ session('success') ? session('success') : (session('status') ? session('status') : session('error')) }}
      </div>
      <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
        data-dismiss-target="#toast-message" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
      </button>
    </div>
  @endif



  <div class="left-container">
  </div>

  <div class="right-container">
    <div class="right-container__box">
      <div class="right-container-box">
        <h3 class="right-container__h2 font-bold">Login</h3>
        <p class="right-container__p text-sm">Scan QR Anda Untuk Masuk</p>
      </div>
      <div class="input-container">
        <form action="{{ route('login.process') }}" method="POST">
          @csrf
          <input type="text" class="right-container__input rounded-lg shadow-md border-gray-300" placeholder=""
            autofocus autocomplete="off" name="kode_user" />
      </div>
      </form>
    </div>
  </div>

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
