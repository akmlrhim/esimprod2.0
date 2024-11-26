@extends('layouts.admin.main')

@section('content')
  {{-- <div class="relative p-3 mx-3">
    <div class="relative">
      <img class="w-full h-64 object-cover opacity-70 rounded-lg shadow-lg" src="{{ asset('img/assets/gedung_tvri.jpg') }}"
        alt="Gedung TVRI" />
      <div class="absolute inset-0 flex flex-col items-center justify-center text-white ml-3 mr-3">
        <div class="bg-tvri_base_color bg-opacity-70 px-6 py-4 rounded-lg shadow-lg text-center inline-block">
          <p>
            Selamat Datang <strong>{{ Auth::user()->nama_lengkap }}</strong>,
            di Sistem Informasi Peminjaman Barang Produksi
          </p>
        </div>

        <div id="current-time" class="text-sm mt-4 bg-tvri_base_color px-4 py-2 rounded shadow-md text-center font-bold">
        </div>
      </div>
    </div>
  </div> --}}


  <div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96 p-3 mx-6">
      <!-- Item 1 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="https://flowbite.com/docs/images/carousel/carousel-1.svg"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
      <!-- Item 2 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="https://flowbite.com/docs/images/carousel/carousel-2.svg"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
      <!-- Item 3 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="https://flowbite.com/docs/images/carousel/carousel-3.svg"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
      <!-- Item 4 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="https://flowbite.com/docs/images/carousel/carousel-4.svg"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
      <!-- Item 5 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="https://flowbite.com/docs/images/carousel/carousel-5.svg"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
      <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
        data-carousel-slide-to="0"></button>
      <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
        data-carousel-slide-to="1"></button>
      <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
        data-carousel-slide-to="2"></button>
      <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
        data-carousel-slide-to="3"></button>
      <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
        data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button"
      class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-10 cursor-pointer group focus:outline-none"
      data-carousel-prev>
      <span
        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
        </svg>
        <span class="sr-only">Previous</span>
      </span>
    </button>
    <button type="button"
      class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-10 cursor-pointer group focus:outline-none"
      data-carousel-next>
      <span
        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
        </svg>
        <span class="sr-only">Next</span>
      </span>
    </button>
  </div>


  <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 p-3 ml-3 mr-3">
    <div class="bg-red-500 border border-gray-200 rounded-lg shadow p-4">
      <div class="flex items-center space-x-2 mb-2">
        <i class="fa-solid fa-cube text-white text-4xl"></i>
        <h1 class="text-4xl text-white font-bold font-sans">{{ $barang }}</h1>
      </div>
      <p class="text-white ">Total Barang</p>
    </div>

    <div class="bg-yellow-400 border border-gray-200 rounded-lg shadow p-4">
      <div class="flex items-center space-x-2 mb-2">
        <i class="fa-solid fa-paper-plane text-white text-4xl"></i>
        <h1 class="text-4xl text-white font-bold font-sans">10</h1>
      </div>
      <p class="text-white ">Total Barang yang Dipinjam</p>
    </div>

    <div class="bg-green-600 border border-gray-200 rounded-lg shadow p-4">
      <div class="flex items-center space-x-2 mb-2">
        <i class="fa-solid fa-screwdriver-wrench text-white text-4xl"></i>
        <h1 class="text-4xl text-white font-bold font-sans">{{ $perawatan }}</h1>
      </div>
      <p class="text-white ">Total Barang dalam Perawatan</p>
    </div>

    <div class="bg-blue-600 border border-gray-200 rounded-lg shadow p-4">
      <div class="flex items-center space-x-2 mb-2">
        <i class="fa-solid fa-user text-white text-4xl"></i>
        <h1 class="text-4xl text-white font-bold font-sans">{{ $user }}</h1>
      </div>
      <p class="text-white">Total User</p>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    function updateDateTime() {
      const now = new Date();
      const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
      };
      const time = now.toLocaleTimeString();
      const date = now.toLocaleDateString('id-ID', options);
      document.getElementById('current-time').innerText = `${date}, ${time}`;
    }
    setInterval(updateDateTime, 1000);
    updateDateTime();
  </script>
@endsection
