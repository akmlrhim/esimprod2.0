@extends('layouts.admin.main')
@section('content')
  <div class="flex p-3 ml-3 mr-3">
    <a href="{{ route('barang.index') }}"
      class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none font-bold rounded-lg text-sm text-center px-5 py-2.5 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
      type="button">
      Kembali
    </a>


  </div>


  {{-- detail content   --}}
  <div class="p-3 ml-6 mr-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <ul
      class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
      id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
      <li class="me-2">
        <button id="detail-tab" data-tabs-target="#detail" type="button" role="tab" aria-controls="detail"
          aria-selected="true"
          class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Detail</button>
      </li>
      <li class="me-2">
        <button id="gambar-tab" data-tabs-target="#gambar" type="button" role="tab" aria-controls="gambar"
          aria-selected="false"
          class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Gambar</button>
      </li>
      <li class="me-2">
        <button id="qrcode-tab" data-tabs-target="#qrcode" type="button" role="tab" aria-controls="qrcode"
          aria-selected="false"
          class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">QR-Code</button>
      </li>
    </ul>


    <div id="defaultTabContent">
      <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="detail" role="tabpanel"
        aria-labelledby="detail-tab">
        <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">{{ $barang->nama_barang }}
        </h2>
        <p class="mb-3 text-gray-500 dark:text-gray-400">{{ $barang->deskripsi }}</p>
        <ul role="list" class="space-y-2 text-gray-500 dark:text-gray-400">
          <li class="flex space-x-2 rtl:space-x-reverse items-center">
            <i class="fa-brands fa-codepen text-sm"></i>
            <span class="leading-tight font-bold">Kode Barang : </span><span> {{ $barang->kode_barang }}</span>
          </li>
          <li class="flex space-x-2 rtl:space-x-reverse items-center">
            <i class="fa-solid fa-6 text-sm"></i>
            <span class="leading-tight font-bold">Nomor Seri : </span><span>{{ $barang->nomor_seri }}</span>
          </li>
          <li class="flex space-x-2 rtl:space-x-reverse items-center">
            <i class="fa-solid fa-copyright text-sm"></i>
            <span class="leading-tight font-bold">Merk : </span><span>{{ $barang->merk }}</span>
          </li>
          <li class="flex space-x-2 rtl:space-x-reverse items-center">
            <i class="fa-solid fa-arrows-up-to-line text-sm"></i>
            <span class="leading-tight font-bold">Limit : </span><span>{{ $barang->limit }}</span>
          </li>
          <li class="flex space-x-2 rtl:space-x-reverse items-center">
            <i class="fa-solid fa-truck-ramp-box text-sm"></i>
            <span class="leading-tight font-bold">Sisa Limit : </span><span>{{ $barang->sisa_limit }}</span>
          </li>
          <li class="flex space-x-2 rtl:space-x-reverse items-center">
            <i class="fa-solid fa-layer-group text-sm"></i>
            <span class="leading-tight font-bold">Jenis Barang :
            </span><span>{{ $barang->jenisBarang->jenis_barang }}</span>
          </li>
          <li class="flex space-x-2 rtl:space-x-reverse items-center">
            @if ($barang->sisa_limit > 0)
              <i class="fa-solid fa-circle-check text-sm text-green-600"></i>
              <span class="leading-tight font-bold text-green-600">Status :
              </span><span class="text-green-600">Tersedia</span>
            @else
              <i class="fa-solid fa-circle-xmark text-sm text-red-600"></i>
              <span class="leading-tight font-bold text-red-600">Status :</span>
              <span class="text-red-600">Habis</span>
            @endif

          </li>
        </ul>
      </div>


      <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="gambar" role="tabpanel"
        aria-labelledby="gambar-tab">
        <figure class="flex flex-col items-center justify-center max-w-lg mx-auto">
          <img class="h-auto w-64 rounded-lg shadow-md" src="{{ asset('storage/uploads/foto_barang/' . $barang->foto) }}"
            alt="image description">
          <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">
            {{ $barang->nama_barang }}
          </figcaption>
        </figure>
      </div>

      <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="qrcode" role="tabpanel"
        aria-labelledby="qrcode-tab">
        <figure class="flex flex-col items-center justify-center max-w-lg mx-auto">
          <img class="h-auto max-w-full rounded-lg shadow-md"
            src="{{ asset('storage/uploads/qr_codes/' . $barang->qr_code) }}" alt="image description">
          <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">
            {{ $barang->kode_barang }}
          </figcaption>
        </figure>
      </div>

    </div>
  </div>
@endsection
