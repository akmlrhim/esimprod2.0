@extends('auth.template')
@section('content')
  <div class="flex items-center justify-center h-screen font-sans m-8">
    <div
      class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg sm:p-3 md:p-6 dark:bg-gray-800 dark:border-gray-700">
      <div class="flex flex-col items-center mb-4">
        <img src="{{ asset('img/assets/esimprod_logo.png') }}" alt="Logo" class="w-1/2">
        <p class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-300">Version 2.0</p>
      </div>
      <form class="space-y-6" action="{{ route('password.validation') }}" method="POST">
        @csrf
        <div>
          @if (session('success'))
            <div id="alert-3"
              class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
              role="alert">
              <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                  d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
              </svg>
              <span class="sr-only">Info</span>
              <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
              </div>
              <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
              </button>
            </div>
          @endif

          <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
          <div class="relative">
            <input type="password" name="password" id="password" placeholder="Masukkan Password" autocomplete="off"
              autofocus
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
            <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer" onclick="togglePassword()">
              <i id="eyeIcon" class="fas fa-eye text-gray-400 hover:text-blue-500"></i>
            </span>

            @if (session('error'))
              <small class="text-red-500 text-sm mt-1"> {{ session('error') }}</small>
            @endif

            @error('password')
              <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="flex items-start">
          <a href="{{ route('password.request') }}"
            class="ms-auto text-sm text-blue-700 hover:underline dark:text-blue-500 font-bold">Lupa
            Password?</a>
        </div>
        <button type="submit"
          class="w-full text-white bg-tvri_base_color hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Masuk
        </button>
      </form>
      <div class="text-sm font-medium text-gray-500 dark:text-gray-300 mt-4">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="text-blue-700 hover:underline dark:text-blue-500">Kembali?</button>
        </form>
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


    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const eyeIcon = document.getElementById('eyeIcon');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
      }
    }
  </script>
@endsection
