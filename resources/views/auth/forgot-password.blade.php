@extends('auth.template')

@section('content')
  <div class="flex items-center justify-center h-screen font-sans px-4 sm:px-8">
    <div
      class="w-full sm:max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-lg sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
      <div class="flex flex-col items-center mb-4">
        <img src="{{ asset('img/assets/esimprod_logo.png') }}" alt="Logo" class="w-1/2">
        <p class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-300">Version 2.0</p>
      </div>
      <form class="space-y-6" action="{{ route('password.email') }}" method="POST">
        @csrf
        <div>
          <div class="flex justify-center items-center mb-5 text-sm font-medium text-gray-600 dark:text-gray-300">
            Masukkan Email yang terdaftar
          </div>

          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
          <div class="relative">
            <input type="email" name="email" id="email" placeholder="Contoh. user@gmail.com" autocomplete="off"
              autofocus
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
            @error('email')
              <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
            @enderror
          </div>
        </div>
        <button type="submit"
          class="w-full text-white bg-tvri_base_color hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Kirim Tautan
        </button>
      </form>
      <div class="text-sm font-medium text-gray-500 dark:text-gray-300 mt-4">
        <a href="{{ route('password') }}" class="text-blue-700 hover:underline dark:text-blue-500">Kembali?</a>
      </div>
    </div>
  </div>
@endsection
