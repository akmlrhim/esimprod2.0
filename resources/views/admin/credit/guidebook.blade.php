@extends('layouts.admin.main')
@section('content')
  <div class="flex flex-col p-3 ml-3">
    <div class="text-start">
      <a href="{{ route('credit.index') }}"
        class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800"
        type="button">
        <i class="fa-solid fa-arrow-left mr-3"></i> Kembali
      </a>
    </div>

    @if ($fileUrl)
      <embed src="{{ $fileUrl }}" type="application/pdf" width="100%" height="600px" class="mt-4">
      <!-- Tambahkan margin-top untuk jarak -->
    @else
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 mt-4">
        <!-- Tambahkan margin-top untuk jarak -->
        <strong class="font-bold">Folder Tidak ditemukan!</strong>
      </div>
    @endif
  </div>
@endsection
