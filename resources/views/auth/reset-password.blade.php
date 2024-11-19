@extends('auth.template')
@section('content')
  <div class="flex items-center justify-center h-screen font-sans m-8">
    <div
      class="w-full max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow-lg sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
      <div class="flex flex-col items-center mb-4">
        <img src="{{ asset('img/assets/esimprod_logo.png') }}" alt="Logo" class="w-1/2">
        <p class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-300">Version 2.0</p>
      </div>
      <form class="space-y-6" action="{{ route('password.update') }}" method="POST">
        @csrf

        <div class="flex justify-center items-center mb-5">
          Reset Password
        </div>


        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        @if (session('status'))
          <div
            class="flex items-center p-2 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
              {{ session('status') }}
            </div>
          </div>
        @endif

        <div>
          <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">Email</label>
          <input type="email" name="email" id="email" placeholder="Contoh. user@gmail.com" autocomplete="off"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
          @error('email')
            <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
          @enderror
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-900 dark:text-white">Password</label>
          <div class="relative">
            <input type="password" name="password" id="password" placeholder="Masukkan Password" autocomplete="off"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
            <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer"
              onclick="togglePassword('password', 'eyeIcon')">
              <i id="eyeIcon" class="fas fa-eye text-gray-400 hover:text-blue-500"></i>
            </span>
          </div>
        </div>

        <div>
          <label for="confirm_password" class="block text-sm font-medium text-gray-900 dark:text-white">Confirm
            Password</label>
          <div class="relative">
            <input type="password" name="password_confirmation" id="confirm_password"
              placeholder="Masukkan Konfirmasi Password" autocomplete="off"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
            <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer"
              onclick="togglePassword('confirm_password', 'eyeIconConfirm')">
              <i id="eyeIconConfirm" class="fas fa-eye text-gray-400 hover:text-blue-500"></i>
            </span>
          </div>
        </div>


        <button type="submit"
          class="w-full text-white bg-tvri_base_color hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Simpan
        </button>
      </form>

      <div class="text-sm font-medium text-gray-500 dark:text-gray-300 mt-4">
        <a href="{{ route('password') }}" class="text-blue-700 hover:underline dark:text-blue-500">Kembali?</a>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    setTimeout(() => {
      const toast = document.getElementById('toast-success');
      if (toast) {
        toast.style.display = 'none';
      }
    }, 6000);

    setTimeout(() => {
      const toast = document.getElementById('toast-danger');
      if (toast) {
        toast.style.display = 'none';
      }
    }, 6000);

    function togglePassword(inputId, iconId) {
      const input = document.getElementById(inputId);
      const icon = document.getElementById(iconId);

      if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    }
  </script>
@endsection
