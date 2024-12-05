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

  @if (session('notValid'))
    <div class="p-3 ml-3 mr-3">
      <div id="alert-2"
        class="flex items-center p-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
          viewBox="0 0 20 20">
          <path
            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
          {{ session('notValid') }}
        </div>
        <button type="button"
          class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
          data-dismiss-target="#alert-2" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
        </button>
      </div>
    </div>
  @endif


  <div class="flex ml-3 mr-3 p-3">
    <div class="w-full max-w-md rounded-lg">
      <form method="POST" action="{{ route('profil.update-password') }}" class="space-y-5">
        @csrf
        @method('PATCH')
        <div class="relative w-full">
          <label for="current_password" class="block text-sm font-medium text-black mb-2">Password Lama</label>
          <div class="relative">
            <input type="password" id="current_password" name="current_password" autocomplete="off"
              value="{{ old('current_password') }}"
              class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <span id="toggle-current-password" class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
              <i class="fas fa-eye text-gray-700"></i>
            </span>
          </div>
        </div>

        <div class="relative w-full">
          <label for="new_password" class="block text-sm font-medium text-black mb-2">Password Baru</label>
          <div class="relative w-full">
            <input type="password" id="new_password" name="new_password" autocomplete="off"
              value="{{ old('new_password') }}"
              class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <span id="toggle-new-password" class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
              <i class="fas fa-eye text-gray-700"></i>
            </span>
          </div>
        </div>

        <div class="relative">
          <label for="confirm_password" class="block text-sm font-medium text-black mb-2">Konfirmasi Password Baru</label>
          <div class="relative w-full">
            <input type="password" id="confirm_password" name="new_password_confirmation" autocomplete="off"
              value="{{ old('new_password_confirmation') }}"
              class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <span id="toggle-confirm-password" class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
              <i class="fas fa-eye text-gray-700"></i>
            </span>
          </div>
        </div>

        <div class="flex">
          <a href="{{ route('profil.index') }}"
            class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 mr-2">
            Ke Profil
          </a>
          <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Update Password
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    document.querySelectorAll('[id^=toggle-]').forEach(toggle => {
      toggle.addEventListener('click', () => {
        const input = toggle.previousElementSibling;
        if (input.type === 'password') {
          input.type = 'text';
          toggle.innerHTML = '<i class="fas fa-eye-slash text-gray-700"></i>';
        } else {
          input.type = 'password';
          toggle.innerHTML = '<i class="fas fa-eye text-gray-700"></i>';
        }
      });
    });
  </script>
@endsection
