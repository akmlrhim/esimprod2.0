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

<body
  class="bg-cover bg-center bg-[url('../../public/img/assets/option-bg-1.png')] bg-opacity-40 bg-blend-multiply flex flex-col min-h-screen">

  <div id="toast-success"
    class="hidden flex items-center fixed top-9 right-14 w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
    role="alert">
    <div
      class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20">
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
      </svg>
      <span class="sr-only">Check icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">Kode di Temukan.</div>
    <button type="button"
      class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
      data-dismiss-target="#toast-success" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>
    </button>
  </div>

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

        <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="hidden">
          @csrf
        </form>

      </div>

    </div>
  </nav>

  <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
  </form>

  <section
    class="flex flex-1 justify-center items-center sm:justify-start sm:items-start pt-10 bg-transparent lg:mt-16">
    <div class="lg:ml-32 md:ml-16 sm:ml-8 px-4 w-full lg:w-auto">
      <div class="mr-auto place-self-center lg:col-span-7 w-full" data-aos="fade-right" data-aos-duration="1500">
        <h1
          class="text-white max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none sm:text-5xl md:text-6xl xl:text-6xl dark:text-white text-left">
          Selamat Datang
        </h1>
        <h3
          class="text-white max-w-2xl mb-4 text-3xl font-extrabold tracking-tight leading-none sm:text-4xl md:text-5xl xl:text-5xl dark:text-white text-left">
          {{ Auth::user()->nama_lengkap }}
        </h3>
        <h3 class="max-w-2xl font-light text-white text-2xl mb-4 dark:text-gray-400 text-left">
          {{ Auth::user()->jabatan->jabatan }} <br>
          {{ Auth::user()->nip }}
        </h3>

        <div
          class="bg-white rounded-lg p-2 shadow-lg flex flex-col sm:flex-row gap-2 items-center justify-center lg:mt-36">
          <a href="{{ route('user.peminjaman.index') }}"
            class="text-white bg-blue-950 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-base sm:text-lg px-10 sm:px-24 py-3 w-full sm:w-auto text-center dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Peminjaman Barang
          </a>
          <button type="button" data-modal-target="scan-modal" data-modal-toggle="scan-modal"
            class="focus:outline-none text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-base sm:text-lg px-10 sm:px-24 py-3 w-full sm:w-auto text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Pengembalian Barang
          </button>
        </div>
      </div>
    </div>
  </section>

  {{-- scan modal --}}
  <div id="scan-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl text-center font-semibold text-gray-900 dark:text-white">
            Scan QR Pengembalian
          </h3>
          <button type="button"
            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="scan-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/1500/svg" fill="none"
              viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d=" m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
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

  <div class="absolute top-0 left-0 right-0 z-50">
    <x-notify::notify />
  </div>

  @notifyJs
</body>

@if (session('error'))
  <script>
    alert("{{ session('error') }}");
  </script>
@endif

<script>
  window.onLoad = function() {
    var screenSize = window.innerWidth;

    fetch("/user/option", {
      method: "GET", // Bisa menggunakan POST jika perlu
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": "{{ csrf_token() }}"
      },
      body: JSON.stringify({
        screen_size: screenSize
      })
    });
  }

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
      modalToggleButton: null,
      toastsuccess: null
    },

    init() {
      // Cache DOM elements
      this.elements.modal = document.getElementById('scan-modal');
      this.elements.input = document.getElementById('code');
      this.elements.errorMessage = document.getElementById('error-message');
      this.elements.confirmButton = document.getElementById('confirm');
      this.elements.modalToggleButton = document.querySelector('[data-modal-toggle="scan-modal"]');
      this.elements.toastsuccess = document.getElementById('toast-success');
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
        this.elements.toastsuccess.classList.remove('hidden'); // Show toast success

        setTimeout(() => {
          window.location.href = 'pengembalian'; // Redirect after 2 seconds
        }, 2000); // 2000 ms = 2 seconds
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
