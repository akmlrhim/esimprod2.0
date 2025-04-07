@extends('layouts.admin.main')

@section('content')
  <div class="flex flex-col md:flex-row w-full">
    <div class="w-full flex flex-col justify-center items-center py-4">
      <div class="bg-white shadow-lg w-3/4 text-center relative h-56 overflow-hidden rounded-lg">
        <img src="{{ asset('img/assets/dashboard.png') }}" alt="Profile Picture" class="w-36 h-36 rounded-lg mx-auto mb-4">
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
            Belum dikembalikan</span>
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
