@extends('layouts.admin.main')

@section('content')
  <div class="flex flex-col md:flex-row w-full">
    <div id="controls-carousel" class="relative w-full md:w-1/2 translate-x-0 sm:translate-x-6 py-4" data-carousel="slide">
      <div class="relative overflow-hidden rounded-lg h-56 opacity-50">
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="https://flowbite.com/docs/images/carousel/carousel-1.svg"
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
          <img src="https://flowbite.com/docs/images/carousel/carousel-1.svg"
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="https://flowbite.com/docs/images/carousel/carousel-1.svg"
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="https://flowbite.com/docs/images/carousel/carousel-1.svg"
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="https://flowbite.com/docs/images/carousel/carousel-1.svg"
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
      </div>

      <button type="button"
        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
          class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5 1 1 5l4 4" />
          </svg>
          <span class="sr-only">Previous</span>
        </span>
      </button>
      <button type="button"
        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
          class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 9 4-4-4-4" />
          </svg>
          <span class="sr-only">Next</span>
        </span>
      </button>
    </div>

    <div class="w-full md:w-1/2 flex flex-col justify-center items-center py-4">
      <div class="bg-white shadow-sm w-3/4 text-center relative h-56 overflow-hidden rounded-lg">
        <img src="{{ asset('img/assets/dashboard.png') }}" alt="Profile Picture"
          class="w-36 h-36 rounded-lg mx-auto mb-4">
        <h3 class="text-lg font-semibold text-black">Selamat Datang, {{ Auth::user()->nama_lengkap }}!</h3>
        <p class="text-sm text-black font-medium">di Sistem Informasi Peminjaman Barang Produksi </p>
      </div>
    </div>
  </div>

  {{-- data card --}}
  <div class="grid gap-4 lg:grid-cols-3 ml-5 mr-3">
    <div class="relative p-6 rounded-2xl bg-gray-200 shadow dark:bg-blue-800">
      <div class="space-y-2">
        <div class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 dark:text-gray-400">
          <span>Barang</span>
        </div>
        <div class="text-xl dark:text-gray-100 font-bold">
          {{ $barang }}
          <span
            class="bg-green-100 text-green-800 text-xs font-medium me-1 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $barang_tersedia }}
            Tersedia</span>
          <span
            class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $barang_hilang }}
            Hilang</span>
          <span
            class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $barang_tidak_tersedia }}
            Habis</span>
        </div>
      </div>
    </div>

    <div class="relative p-6 rounded-2xl bg-gray-100 shadow dark:bg-gray-800">
      <div class="space-y-2">
        <div class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 dark:text-gray-400">
          <span>Peminjaman</span>
        </div>
        <div class="text-xl dark:text-gray-100 font-bold">
          {{ $peminjaman }}
          <span
            class="bg-yellow-100 text-yellow-800 text-xs font-medium me-1 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $peminjaman_proses }}
            Proses</span>
          <span
            class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $peminjaman_selesai }}
            Selesai</span>
        </div>
      </div>
    </div>

    <div class="flex p-6 rounded-2xl bg-violet-100 shadow dark:bg-gray-800">
      <div class="space-y-2">
        <div class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 dark:text-gray-400">
          <span>Pengembalian</span>
        </div>
        <div class="text-xl dark:text-gray-100 font-bold">
          {{ $pengembalian }}
          <span
            class="bg-red-100 text-red-800 text-xs font-medium me-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $pengembalian_incomplete }}
            Tidak Lengkap</span>
          <span
            class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $pengembalian_complete }}
            Lengkap</span>
        </div>
      </div>
    </div>

    <div class="flex p-6 rounded-2xl bg-gray-200 shadow dark:bg-gray-800">
      <div class="space-y-2">
        <div class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 dark:text-gray-400">
          <span>Jabatan</span>
        </div>
        <div class="text-xl dark:text-gray-100 font-bold">
          {{ $jabatan }}
        </div>
      </div>
    </div>

    <div class="flex p-6 rounded-2xl bg-rose-100 shadow dark:bg-gray-800">
      <div class="space-y-2">
        <div class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 dark:text-gray-400">
          <span>Jenis Barang</span>
        </div>
        <div class="text-xl dark:text-gray-100 font-bold">
          {{ $jenis_barang }}
        </div>
      </div>
    </div>

    <div class="flex p-6 rounded-2xl bg-blue-200 shadow dark:bg-gray-800">
      <div class="space-y-2">
        <div class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 dark:text-gray-400">
          <span>Peruntukan</span>
        </div>
        <div class="text-xl dark:text-gray-100 font-bold">
          {{ $peruntukan }}
        </div>
      </div>
    </div>

    <div class="flex p-6 rounded-2xl bg-gray-300 shadow dark:bg-gray-800">
      <div class="space-y-2">
        <div class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 dark:text-gray-400">
          <span>User</span>
        </div>
        <div class="text-xl dark:text-gray-100 font-bold">
          {{ $user }}
        </div>
      </div>
    </div>
  </div>
@endsection
