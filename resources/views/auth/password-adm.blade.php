@extends('auth.template')
@section('content')
  <div class="flex items-center justify-center h-screen font-sans px-4 sm:px-8">
    <div
      class="w-full sm:max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg p-4 sm:p-6 dark:bg-gray-800 dark:border-gray-700">
      <div class="flex flex-col items-center mb-4">
        <img src="{{ asset('img/assets/esimprod_logo.png') }}" alt="Logo" class="w-1/2">
        <p class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-300">Version 2.0</p>
      </div>
      <form class="space-y-6" action="{{ route('password.validation') }}" method="POST">
        @csrf
        <div>
          <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
          <div class="relative">
            <input type="password" name="password" id="password" placeholder="Masukkan Password" autocomplete="off"
              autofocus
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
            <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer" onclick="togglePassword()">
              <i id="eyeIcon" class="fas fa-eye text-gray-400 hover:text-blue-500"></i>
            </span>
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
