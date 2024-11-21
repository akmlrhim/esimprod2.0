@extends('layouts.admin.main')

@section('content')
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
      <p class="text-white ">Total User</p>
    </div>
  </div>
@endsection
