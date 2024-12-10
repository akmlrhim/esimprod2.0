<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/output.css') }}">
  <link rel="shortcut icon" href="{{ asset('img/assets/esimprod_logo_bg.png') }}" type="image/x-icon">

  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">
  <link href="https://fonts.cdnfonts.com/css/avenir" rel="stylesheet">
  <title>User Login | Redirect Page</title>
  @notifyCss
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
  class="bg-center bg-cover bg-no-repeat bg-[url('../../public/img/assets/gedung_tvri.jpg')] bg-tvri_base_color bg-opacity-40 bg-blend-multiply flex flex-col min-h-screen">
  {{-- Navbar --}}
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

        <div class="relative">
          <button class="flex items-center space-x-2 text-white focus:outline-none">
            <img src="{{ asset('storage/uploads/foto_user/' . Auth::user()->foto) }}" alt="User"
              class="h-10 w-10 rounded-full" />
          </button>
          <div
            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 invisible group-hover:visible">
            <ul class="py-1 text-gray-700">
              <li><a href="#" class="block px-4 py-2 text-sm"
                  onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>


  {{-- trigger logout with <a>  --}}
  <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
  </form>

  <section class="flex flex-1 justify-center items-center pt-19">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
      <div class="mr-auto place-self-center lg:col-span-7">
        <h1
          class="text-white max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
          Selamat Datang {{ Auth::user()->nama_lengkap }}</h1>
        <p class="max-w-2xl font-light text-white lg:mb-8 md:text-lg lg:text-xl mb-4 dark:text-gray-400">
          {{ Auth::user()->jabatan->jabatan }} <br>
          {{ Auth::user()->nip }}
        </p>

        <a href="{{ route('user.peminjaman.index') }}"
          class="text-white bg-blue-700 hover:bg-blue-800
          focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600
          dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
          Peminjaman Barang
        </a>
        <button type="button" button type="button" data-modal-target="scan-modal" data-modal-toggle="scan-modal"
          class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
          Pengembalian Barang
        </button>
      </div>
      <div class="hidden lg:mt-0 lg:col-span-5 lg:grid grid-cols-2 gap-4 justify-center">
        <!-- Tiga gambar kecil -->
        <div class="flex flex-col gap-4 -ml-6">
          <img src="{{ asset('img/assets/IMG_6908.jpg') }}" class="rounded-lg max-w-xs max-h-48" alt="mockup" />
          <img src="{{ asset('img/assets/IMG_6908.jpg') }}" class="rounded-lg max-w-xs max-h-48" alt="mockup" />
          <img src="{{ asset('img/assets/IMG_6908.jpg') }}" class="rounded-lg max-w-xs max-h-48" alt="mockup" />
        </div>
        <!-- Gambar besar di samping -->
        <div class="flex items-center justify-center ml-16">
          <img src="{{ asset('img/assets/IMG_6908.jpg') }}" class="rounded-lg max-w-xs h-96 object-cover"
            alt="mockup" />
        </div>
      </div>
    </div>
  </section>

  {{-- scan modal  --}}
  <div id="scan-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl text-center font-semibold text-gray-900 dark:text-white">
            Scan QR Pengembalian
          </h3>
          <button type="button"
            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="scan-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5">
          <div>
            <input type="text" name="code" id="code"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
              placeholder="Kode Peminjaman" />
            <span id="error-message" class="text-red-600 text-sm mt-2 hidden"></span>
          </div>
          <button type="button" id="confirm"
            class="w-full mt-4 text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Lanjut</button>
        </div>
      </div>
    </div>
  </div>

  <x-notify::notify />
  @notifyJs
</body>


<script>
  // User dropdown 
  document.addEventListener("DOMContentLoaded", function() {
    const userButton = document.querySelector(".flex.items-center.space-x-2");
    const dropdown = document.querySelector(".absolute");

    userButton.addEventListener("click", function() {
      dropdown.classList.toggle("opacity-100");
      dropdown.classList.toggle("invisible");
    });
  });



  // Configuration Constants
  const CONFIG = {
    API_ENDPOINTS: {
      CHECK_CODE: '/user/pengembalian/check'
    },
    MODAL_FOCUS_DELAY: 200,
    ERROR_MESSAGES: {
      EMPTY_CODE: 'Kode peminjaman tidak boleh kosong!',
      SERVER_ERROR: 'Terjadi kesalahan: Tidak dapat terhubung ke server.'
    }
  };

  // Utility Functions
  const Utils = {
    getCsrfToken() {
      return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    },
    showError(errorElement, message) {
      errorElement.textContent = message;
      errorElement.classList.remove('hidden');
    },
    hideError(errorElement) {
      errorElement.textContent = '';
      errorElement.classList.add('hidden');
    }
  };

  // Scan Modal Management
  const ScanModalManager = {
    elements: {
      modal: null,
      input: null,
      errorMessage: null,
      confirmButton: null,
      modalToggleButton: null
    },

    init() {
      // Cache DOM elements
      this.elements.modal = document.getElementById('scan-modal');
      this.elements.input = document.getElementById('code');
      this.elements.errorMessage = document.getElementById('error-message');
      this.elements.confirmButton = document.getElementById('confirm');
      this.elements.modalToggleButton = document.querySelector('[data-modal-toggle="scan-modal"]');

      // Initialize error message
      Utils.hideError(this.elements.errorMessage);

      // Set up event listeners
      this.setupModalFocusListeners();
      this.setupConfirmButtonListener();
    },

    setupModalFocusListeners() {
      // Attempt to use native modal show event
      if (this.elements.modal.addEventListener) {
        this.elements.modal.addEventListener('show', () => {
          this.focusInput();
        });
      }

      // Fallback for modal toggle
      if (this.elements.modalToggleButton) {
        this.elements.modalToggleButton.addEventListener('click', () => {
          setTimeout(() => {
            this.focusInput();
          }, CONFIG.MODAL_FOCUS_DELAY);
        });
      }
    },

    focusInput() {
      if (this.elements.input) {
        this.elements.input.focus();
      }
    },

    setupConfirmButtonListener() {
      this.elements.confirmButton.addEventListener('click', () => {
        this.handleCodeConfirmation();
      });
    },

    handleCodeConfirmation() {
      // Reset error state
      Utils.hideError(this.elements.errorMessage);

      const code = this.elements.input.value.trim();

      // Validate input
      if (!code) {
        Utils.showError(
          this.elements.errorMessage,
          CONFIG.ERROR_MESSAGES.EMPTY_CODE
        );
        return;
      }

      // Send validation request
      this.validateCode(code);
    },

    async validateCode(code) {
      try {
        const response = await fetch(CONFIG.API_ENDPOINTS.CHECK_CODE, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': Utils.getCsrfToken()
          },
          body: JSON.stringify({
            code
          })
        });

        const data = await response.json();
        this.handleValidationResponse(data);
      } catch (error) {
        this.handleValidationError(error);
      }
    },

    handleValidationResponse(data) {
      if (data.success) {
        // Success scenario
        alert('Kode ditemukan! ' + data.message);
        window.location.href = 'pengembalian';
      } else {
        // Validation failed
        Utils.showError(
          this.elements.errorMessage,
          data.message
        );
      }
    },

    handleValidationError(error) {
      console.error('Error:', error);
      Utils.showError(
        this.elements.errorMessage,
        CONFIG.ERROR_MESSAGES.SERVER_ERROR
      );
    }
  };

  // Initialize on DOM Load
  document.addEventListener('DOMContentLoaded', () => {
    ScanModalManager.init();
  });
</script>

</html>
