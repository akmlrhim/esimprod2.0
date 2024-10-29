@extends('layouts.admin.main')
@section('content')
  <div class="flex p-3 ml-3 mr-3">
    <a href="#"
<<<<<<< HEAD
      class="px-3 py-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-blue-300 font-medium rounded-lg text-xs me-2  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none"><i
=======
      class="px-3 py-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs me-2  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i
>>>>>>> 1f47649 (fix)
        class="fa-solid fa-cube mr-2"></i>
      Tambah Barang</a>

    <a href="{{ route('jenis_barang.index') }}"
<<<<<<< HEAD
      class="text-white bg-orange-700 hover:bg-orange-400 font-medium rounded-lg text-xs px-3 py-2 me-2  dark:bg-orange-600 dark:hover:bg-orange-700 focus:outline-none"><i
        class="fa-solid fa-layer-group mr-2"></i>Jenis Barang</a>

    <a href="#"
      class="text-white bg-green-700 hover:bg-green-400 font-medium rounded-lg text-xs px-3 py-2 me-2  dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none"><i
        class="fa-solid fa-qrcode mr-2"></i>Cetak Semua QR Code</a>

    <a href="#"
      class="text-white bg-gray-700 hover:bg-gray-400 font-medium rounded-lg text-xs px-3 py-2 me-2  dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none"><i
=======
      class="text-white bg-orange-700 hover:bg-orange-400 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-xs px-3 py-2 me-2  dark:bg-orange-600 dark:hover:bg-orange-700 focus:outline-none dark:focus:ring-orange-800"><i
        class="fa-solid fa-layer-group mr-2"></i>Jenis Barang</a>

    <a href="#"
      class="text-white bg-green-700 hover:bg-green-400 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-2 me-2  dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800"><i
        class="fa-solid fa-qrcode mr-2"></i>Cetak Semua QR Code</a>

    <a href="#"
      class="text-white bg-gray-700 hover:bg-gray-400 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-xs px-3 py-2 me-2  dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800"><i
>>>>>>> 1f47649 (fix)
        class="fa-solid fa-print mr-2"></i>Cetak Semua Barang</a>
  </div>

  {{-- card barang  --}}
  <div class="flex-col p-3 ml-3 mr-3 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-5">
    <div
      class="relative max-w-xs bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
      <a href="#">
        <img class="rounded-t-lg w-full h-auto object-cover" src="{{ asset('img/pexels-hikaique-243757.jpg') }}"
          alt="Image Description" />
        <span class="absolute top-3 left-3 bg-tvri_base_color text-white text-sm font-semibold px-2 py-0.5 rounded-full">
          Tersedia
        </span>
      </a>
      <div class="p-5">
        <div class="flex justify-between items-center">
          <h5 class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">
            Kamera
          </h5>
          <span
            class="bg-green-500 text-white text-xs font-semibold px-2 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
            Tersedia
          </span>
        </div>
        <p class="font-normal text-gray-700 dark:text-gray-400">
          <strong>Kode</strong> BRG-1102
        </p>
        <p class="font-normal text-gray-700 dark:text-gray-400">
          <strong>Harga</strong> 1.00.000
        </p>
        <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">
          <strong>Harga</strong> 1.00.000
        </p>
        <a href="#"
          class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800  focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Read more
          <svg class="rtl:rotate-180 w-4 h-4 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 5h12m0 0L9 1m4 4L9 9" />
          </svg>
        </a>
      </div>
    </div>
  </div>
@endsection
