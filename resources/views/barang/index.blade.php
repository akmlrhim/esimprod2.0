@extends('layouts.admin.main')
@section('content')
  <div class="flex p-3 ml-3 mr-3">
    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
      type="button">Opsi / Tindakan <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
        fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
      </svg>
    </button>

    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
      <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
        <li>
          <a href="{{ route('barang.create') }}"
            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tambah
            Barang</a>
        </li>
        <li>
          <a href="{{ route('jenis_barang.index') }}"
            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Jenis
            Barang</a>
        </li>
        <li>
          <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cetak
            Semua QR Code</a>
        </li>
        <li>
          <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cetak
            Semua Barang</a>
        </li>
      </ul>
    </div>
  </div>

  {{-- card barang  --}}
  <div class="flex-col p-3 ml-3 mr-3 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-5">
    <div
      class="relative max-w-xs bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
      <a href="#">
        <img class="rounded-t-lg w-full h-auto object-cover" src="{{ asset('img/pexels-hikaique-243757.jpg') }}"
          alt="Image Description" />
        <span class="absolute top-3 left-3 bg-tvri_base_color text-white text-xs font-semibold px-2 py-0.5 rounded-full">
          Drone
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
          class="inline-flex items-center px-4 py-2 text-xs font-semibold text-white bg-blue-700 rounded-lg hover:bg-blue-800  focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
