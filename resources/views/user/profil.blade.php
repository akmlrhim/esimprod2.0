<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="{{ asset('img/assets/esimprod_logo_bg.png') }}" type="image/x-icon">

  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">
  <link href="https://fonts.cdnfonts.com/css/avenir" rel="stylesheet">
  <title>User Options</title>
  @notifyCss
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="dark:bg-gray-900 antialiased overflow-auto"
  style="background: url({{ asset('img/assets/template-auth.jpg') }})">
  <nav class="fixed top-0 z-50 w-full dark:bg-gray-800 dark:border-gray-700 font-sans">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <p class="flex ms-2 md:me-24">
            <img src="{{ asset('img/assets/esimprod_logo.png') }}" class="h-8 me-3 bg-blue-900 p-1 rounded-lg"
              alt="ESIMPROD" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">
              <small class="text-xs text-white font-thin">Version 2.0</small>
            </span>
          </p>
        </div>
        <div class="flex items-center">
          <div>
            <button type="button"
              class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
              aria-expanded="false" data-dropdown-toggle="dropdown-user">
              <span class="sr-only">Open user menu</span>
              <img class="w-8 h-8 rounded-full"
                src="{{ Auth::user()->foto ? asset('storage/uploads/foto_user/' . Auth::user()->foto) : Avatar::create(Auth::user()->nama_lengkap)->toBase64() }}"
                alt="user photo">
            </button>
          </div>
          <div
            class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
            id="dropdown-user">
            <ul class="py-1" role="none">
              <li>
                <a href="{{ route('user.profil') }}"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                  role="menuitem">
                  <span class="font-semibold">Profil Saya</span>
                </a>
              </li>

              <div class="my-2 border-t border-gray-200 dark:border-gray-600"></div>
              <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                  role="menuitem">
                  <span class="font-semibold">Logout</span>
                </a>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </div>
    </div>
  </nav>


  {{-- form edit profil  --}}
  <div class="mt-24 md:mt-12 lg:mt-24 ml-6 md:ml-12 lg:ml-24 mr-6 md:mr-12 lg:mr-24">
    <div class="bg-white shadow-md border w-full dark:bg-gray-800 relative h-auto overflow-hidden rounded-lg p-6 mb-4">
      <h1 class="font-bold text-2xl">Data Pribadi</h1>
      <p class="text-sm font-light text-gray-400 mt-1">
        Pastikan informasi Anda tetap valid dengan memperbarui data
        secara berkala.</p>
      <div class="mt-4">
        <form method="POST" action="{{ route('user.profil.update') }}" class="space-y-5" enctype="multipart/form-data">
          @csrf
          @method('PATCH')

          <div class="mb-3">
            <label for="nama_lengkap" class="block text-sm font-bold text-gray-900 dark:text-white">Nama Lengkap
            </label>
            <input type="text" id="nama_lengkap" name="nama_lengkap"
              value="{{ old('nama_lengkap', Auth::user()->nama_lengkap) }}" autocomplete="off"
              class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full lg:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="John Doe" />
            @error('nama_lengkap')
              <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
            @enderror
          </div>

          <div class="mb-3">
            <label for="email" class="block text-sm font-bold text-gray-900 dark:text-white">Email
            </label>
            <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}"
              autocomplete="off"
              class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full lg:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="example@.com" />
            @error('email')
              <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
            @enderror
          </div>

          <div class="mb-3">
            <label for="nip" class="block text-sm font-bold text-gray-900 dark:text-white">NIP
            </label>
            <input type="text" id="nip" name="nip" inputmode="numeric"
              value="{{ old('nip', Auth::user()->nip) }}" autocomplete="off"
              class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full lg:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="1992XXXXX" />
            @error('nip')
              <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
            @enderror
          </div>

          <div class="mb-3">
            <label for="nomor_hp" class="block text-sm font-bold text-gray-900 dark:text-white">Nomor HP
            </label>
            <input type="text" id="nomor_hp" name="nomor_hp" inputmode="numeric"
              value="{{ old('nomor_hp', Auth::user()->nomor_hp) }}" autocomplete="off"
              class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full lg:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="0813XXXXXX" />
            @error('nomor_hp')
              <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
            @enderror
          </div>

          <div class="mb-3">
            <label for="foto" class="block text-sm font-bold text-gray-900 dark:text-white">Upload Foto (opsional)
            </label>
            <input type="file" id="foto" name="foto" autocomplete="off"
              class="block w-full lg:w-1/2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
              aria-describedby="foto_profil" id="foto_profil" type="file" />
            @error('foto')
              <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
            @enderror
          </div>

          <div class="flex space-x-2">
            <a href="{{ route('user.option') }}"
              class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
              Kembali
            </a>
            <button type="submit"
              class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="absolute top-0 left-0 right-0 z-50">
    <x-notify::notify />
  </div>

  @notifyJs
</body>

</html>
