<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
  >
  <meta
    http-equiv="X-UA-Compatible"
    content="ie=edge"
  >
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link
    rel="stylesheet"
    href="{{ asset('css/output.css') }}"
  >
  <link
    rel="shortcut icon"
    href="{{ asset('/favicon.ico') }}"
    type="image/x-icon"
  >
  <link
    rel="stylesheet"
    href="{{ asset('fa/css/all.min.css') }}"
  >
  <link
    href="https://db.onlinewebfonts.com/c/7dd5f4bf5d38875ca1822a830b6e6fe4?family=Aptos"
    rel="stylesheet"
  >

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>Opsi Login</title>
</head>

<body
  style="background-color: #156082;"
  class=" dark:bg-neutral-900 flex flex-col min-h-screen font-sans"
>

  @if (session('success'))
    <div
      id="toast-success"
      class="fixed top-5 right-5 z-[9999] flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
      role="alert"
    >
      <div
        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200"
      >
        <svg
          class="w-5 h-5"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          fill="currentColor"
          viewBox="0 0 20 20"
        >
          <path
            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
          />
        </svg>
        <span class="sr-only">Check icon</span>
      </div>
      <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
      <button
        type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
        data-dismiss-target="#toast-success"
        aria-label="Close"
      >
        <span class="sr-only">Close</span>
        <svg
          class="w-3 h-3"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 14 14"
        >
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
          />
        </svg>
      </button>
    </div>
  @endif



  <nav
    style="background-color: #156082;"
    class="fixed top-0 z-50 w-full dark:bg-gray-800 dark:border-gray-700 font-aptos"
  >
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <a
            href="/"
            class="flex ms-2 md:me-24"
          >
            <img
              src="{{ asset('img/assets/esimprod_logo.png') }}"
              class="h-8 me-3 bg-blue-900 p-1 rounded-lg"
              alt="ESIMPROD"
            />
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
      class="w-5/6 max-w-xl m-auto p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700"
    >
      <div class="flex justify-end px-4 pt-4">
        <button
          id="dropdownButton"
          data-dropdown-toggle="dropdown"
          class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
          type="button"
        >
          <span class="sr-only">Open dropdown</span>
          <svg
            class="w-5 h-5"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            viewBox="0 0 16 3"
          >
            <path
              d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"
            />
          </svg>
        </button>
        <!-- Dropdown menu -->
        <div
          id="dropdown"
          class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700"
        >
          <ul
            class="py-2"
            aria-labelledby="dropdownButton"
          >
            <li>
              <a
                href="#"
                class="flex items-center p-2 text-red-700 rounded-lg dark:text-white hover:bg-gray-100 hover:text-tvri_base_color dark:hover:bg-gray-700 group"
                onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"
              >Logout
              </a>

              <form
                id="logoutForm"
                action="{{ route('logout') }}"
                method="POST"
                style="display: none;"
              >
                @csrf
              </form>
            </li>
          </ul>
        </div>
      </div>
      <div class="flex flex-col items-center pb-10">
        <img
          class="w-24 h-24 mb-3 rounded-full shadow-lg"
          src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
          alt="Bonnie image"
        />
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Selamat Datang
          {{ Auth::user()->nama_lengkap }}</h5>
        <span class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->jabatan }}</span>
        <span class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->NIP }}</span>
        <div class="flex mt-4 md:mt-6">
          <a
            href="/peminjaman"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-900 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          >Pinjam</a>
          <a
            href="#"
            data-modal-target="scan-modal"
            data-modal-toggle="scan-modal"
            class="py-2 px-4 ms-2 text-sm font-medium text-white bg-green-500 rounded-lg hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
          >Kembalikan</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Main modal -->
  <div
    id="scan-modal"
    tabindex="-1"
    aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
  >
    <div class="relative p-4 w-full max-w-md max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl text-center font-semibold text-gray-900 dark:text-white">
            Scan QR Pengembalian
          </h3>
          <button
            type="button"
            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="scan-modal"
          >
            <svg
              class="w-3 h-3"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 14 14"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
              />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5">
          <form
            class="space-y-4"
            action="#"
          >
            <div>
              <input
                type="email"
                name="email"
                id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="name@company.com"
              />
            </div>
            <button
              type="submit"
              class="w-full text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >Lanjut</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

<script>
  const modal = document.getElementById('scan-modal');
  const input = document.getElementById('email');

  modal.addEventListener('show', function() {
    input.focus();
  });

  const modalToggleButton = document.querySelector('[data-modal-toggle="scan-modal"]');
  modalToggleButton.addEventListener('click', function() {
    setTimeout(() => {
      input.focus();
    }, 200);
  });

  setTimeout(() => {
    const toast = document.getElementById('toast-success');
    if (toast) {
      toast.style.display = 'none';
    }
  }, 6000);
</script>

</html>
