<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>ESIMPROD - Login Page</title>
  <link rel="shortcut icon" href="{{ asset('img/assets/esimprod_logo_bg.png') }}" type="image/x-icon">

  <link href="https://fonts.cdnfonts.com/css/avenir" rel="stylesheet">


  @vite(['resources/css/app.css', 'resources/js/app.js'])
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

  <div class="flex justify-center items-center w-full h-screen">
    <div class="w-1/2 h-full hidden lg:block">
      <img src="{{ asset('img/assets/login_1.png') }}" alt="Placeholder Image" class="object-cover w-full h-full">
    </div>

    <div class="flex flex-col justify-center items-center lg:p-36 md:p-52 sm:p-20 p-8 w-full lg:w-1/2">
      <h1 class="text-3xl font-semibold mb-4 text-center text-black">Login</h1>
      <p class="mb-10 text-black">Scan QR Code untuk Masuk !</p>
      <div id="camera" style="width:320px; height:240px;" class="hidden"></div>
      <form action="{{ route('login.process') }}" method="POST" class="w-full max-w-md" enctype="multipart/form-data"
        id="loginForm">
        @csrf
        <div class="mb-6">
          <input type="hidden" name="gambar" id="gambar">
          <input type="text" id="kode_user" name="kode_user" placeholder="Masukkan kode user anda jika tidak bisa !"
            class="w-full border border-gray-300 rounded-lg shadow-lg py-2 px-3 focus:outline-none focus:border-blue-500"
            autocomplete="off" autofocus>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

  <script>
    setTimeout(() => {
      const toast = document.getElementById('toast-message');
      if (toast) {
        toast.style.display = 'none';
      }
    }, 6000);

    Webcam.set({
      width: 320,
      height: 240,
      image_format: 'jpeg',
      jpeg_quality: 90
    });
    Webcam.attach('#camera');

    document.getElementById('loginForm').addEventListener('submit', function(e) {
      e.preventDefault();

      Webcam.snap(function(dataUri) {
        document.getElementById('gambar').value = dataUri;
        e.target.submit();
      });
    });
  </script>
</body>

</html>
