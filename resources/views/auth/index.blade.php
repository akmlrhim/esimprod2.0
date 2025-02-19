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
  {{-- 
  <link
    rel="https://cdn.rawgit.com/mfd/f3d96ec7f0e8f034cc22ea73b3797b59/raw/856f1dbb8d807aabceb80b6d4f94b464df461b3e/gotham.css"> --}}

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-hidden">

  <x-auth-validation></x-auth-validation>

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
