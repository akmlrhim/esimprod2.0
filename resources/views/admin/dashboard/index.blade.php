@extends('layouts.admin.main')

@section('content')
  <div class="relative p-3 mx-3">
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
