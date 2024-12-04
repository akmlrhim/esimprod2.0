@extends('layouts.admin.main')
@section('content')

  @if ($errors->any())
    <div class="p-3 ml-3 mr-3">
      <div class="flex p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
          fill="currentColor" viewBox="0 0 20 20">
          <path
            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Danger</span>
        <div>
          <span class="font-medium">Ada beberapa masalah:</span>
          <ul class="mt-1.5 list-disc list-inside">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  @endif


  <div class="flex ml-3 mr-3 p-3">
    <div class="w-full max-w-md rounded-lg">
      <form method="POST" action="{{ route('profil.update-profil') }}" class="space-y-5" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="relative">
          <label for="nama_lengkap" class="block text-sm font-medium text-black mb-2">Nama Lengkap</label>
          <div class="relative w-full">
            <input type="text" id="nama_lengkap" name="nama_lengkap" autocomplete="off"
              value="{{ old('nama_lengkap', Auth::user()->nama_lengkap) }}"
              class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          </div>
        </div>

        <div class="relative w-full">
          <label for="email" class="block text-sm font-medium text-black mb-2">Email</label>
          <div class="relative w-full">
            <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}"
              autocomplete="off"
              class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          </div>
        </div>

        <div class="relative">
          <label for="nip" class="block text-sm font-medium text-black mb-2">NIP</label>
          <div class="relative w-full">
            <input type="text" id="nip" name="nip" value="{{ old('nip', Auth::user()->nip) }}"
              autocomplete="off"
              class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          </div>
        </div>

        <div class="relative">
          <label for="nomor_hp" class="block text-sm font-medium text-black mb-2">Nomor HP</label>
          <div class="relative w-full">
            <input type="text" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp', Auth::user()->nomor_hp) }}"
              autocomplete="off"
              class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          </div>
        </div>

        <div class="relative">
          <label for="foto" class="block text-sm font-medium text-black mb-2">Upload Foto (opsional)</label>
          <div class="relative w-full">
            <input type="file" id="foto" name="foto" autocomplete="off"
              class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
              aria-describedby="foto_avatar_help" id="foto_profil" type="file">
          </div>
        </div>

        <div class="flex">
          <a href="{{ route('profil.index') }}"
            class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 mr-2">
            Ke Profil
          </a>
          <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Update
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
