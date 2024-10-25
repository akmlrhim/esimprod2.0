@extends('layouts.admin.main')
@section('content')
  <div class="flex flex-col p-3 ml-3">
    <div class="text-start mb-2">
      <a href="{{ route('credit.index') }}"
        class="edit-credit inline-flex items-center px-4 py-2 text-sm bg-gray-400 border border-transparent rounded-md font-semibold text-white hover:bg-black focus:ring"
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
