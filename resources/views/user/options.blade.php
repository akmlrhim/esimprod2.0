<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('css/output.css') }}">
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('fa/css/all.min.css') }}">
  <link href="https://db.onlinewebfonts.com/c/7dd5f4bf5d38875ca1822a830b6e6fe4?family=Aptos" rel="stylesheet">
  <title>Opsi Login</title>
</head>

<body style="background-color: #156082;" class=" dark:bg-neutral-900 flex flex-col min-h-screen">

  <nav style="background-color: #156082;"
    class="fixed top-0 z-50 w-full dark:bg-gray-800 dark:border-gray-700 font-aptos">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <a href="/" class="flex ms-2 md:me-24">
            <img src="{{ asset('img/assets/esimprod_logo.png') }}" class="h-8 me-3 bg-blue-900 p-1 rounded-lg"
              alt="ESIMPROD" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">
              <small class="text-xs text-white font-thin">Version 2.0</small>
            </span>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content Area -->
  <div class="flex flex-1 justify-center items-center pt-19">
    <!-- Adjusted padding-top to create space for navbar -->
    <div
      class="w-5/6 max-w-xl m-auto p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
      <div class="flex justify-end px-4 pt-4">
        <button id="dropdownButton" data-dropdown-toggle="dropdown"
          class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
          type="button">
          <span class="sr-only">Open dropdown</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 16 3">
            <path
              d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
          </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdown"
          class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
          <ul class="py-2" aria-labelledby="dropdownButton">
            <li>
              <a href="#"
                class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="flex flex-col items-center pb-10">
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
          src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Bonnie image" />
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Selamat Datang Akbar Laksana</h5>
        <span class="text-sm text-gray-500 dark:text-gray-400">Teknisi Siaran</span>
        <span class="text-sm text-gray-500 dark:text-gray-400">199004232022031007</span>
        <div class="flex mt-4 md:mt-6">
          <a href="{{ route('user.peminjaman.index') }}"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-900 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pinjam</a>
          <a href="#" data-modal-target="scan-modal" data-modal-toggle="scan-modal"
            class="py-2 px-4 ms-2 text-sm font-medium text-white bg-green-500 rounded-lg hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Kembalikan</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Main modal -->
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
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
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
                placeholder="Kode Peminjaman"/>
                <span id="error-message" class="text-red-600 text-sm mt-2 hidden"></span>
            </div>
            <button type="button" id="confirm"
              class="w-full text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Lanjut</button>
        </div>
      </div>
    </div>
  </div>

</body>

<script>
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
                    body: JSON.stringify({ code })
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
