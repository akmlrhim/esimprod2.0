@extends('layouts.admin.main')
@section('content')
  {{-- search form --}}
  @if (!$barang->isEmpty())
    <form class="flex items-center max-w-sm mx-auto p-3 ml-3 mr-3" action="{{ route('barang.search') }}" method="GET">
      <label for="simple-search" class="sr-only">Search</label>
      <div class="w-full relative">
        <input type="text" id="search" autocomplete="off"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Masukkan kata kunci...." required name="search" />
        <svg class="w-4 h-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-tvri_base_color" aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m19 19-4-4m0-7A7 7 0 1 1   1 8a7 7 0 0 1 14 0Z" />
        </svg>
      </div>
    </form>
  @endif

  @if ($count > 5)
    <div class="p-3 ml-3 mr-3">
      {{ $barang->links() }}
    </div>
  @endif

  @if ($barang->isEmpty())
    <div class="flex flex-col p-3 ml-3">
      <div class="flex items-center p-4 mb-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
        role="alert">
        <i class="fa-solid fa-circle-info mr-3"></i>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-bold">Info!</span> Tidak ada data
        </div>
      </div>
    </div>
  @endif

  {{-- card barang  --}}
  <div class="flex justify-center p-3 ml-3 mr-3">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5 w-full">
      @foreach ($barang as $b)
        <div
          class="w-full bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 relative">
          <a href="{{ route('perawatan.barang.detail', $b->uuid) }}">
            <img class="w-full rounded-lg h-48 object-cover mx-auto"
              src="{{ asset('storage/uploads/foto_barang/' . $b->foto) }}" alt="Image Description" />
          </a>
          <span
            class="absolute top-3 left-3 bg-tvri_base_color text-white text-xs font-semibold px-2 py-0.5 rounded-full">
            {{ $b->jenisBarang->jenis_barang }}
          </span>
          <div class="p-5">
            <div class="flex justify-between items-center">
            </div>
            <p class="font-normal text-gray-700 dark:text-gray-400">
              <strong>{{ $b->nama_barang }}</strong>
            </p>
            <p class="font-normal text-gray-700 dark:text-gray-400">
              <strong>Sisa Limit : </strong> {{ $b->sisa_limit }}
            </p>
            <p class="font-normal text-gray-700 dark:text-gray-400">
              <strong>Status : </strong>
              @if ($b->status == 'tidak-tersedia')
                <span
                  class="bg-red-500 text-white text-xs font-semibold px-2 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                  Habis
                </span>
              @else
                <span
                  class="bg-green-500 text-white text-xs font-semibold px-2 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                  Tersedia
                </span>
              @endif
            </p>
            <div class="mt-3">

              <a href="{{ route('perawatan.barang.detail', $b->uuid) }}" title="Detail"
                class="inline-flex text-green-700 hover:text-white border border-green-700 hover:bg-green-800 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600">
                <i class="fa-solid fa-circle-info"></i>
              </a>

              <button data-modal-target="reset-modal" data-modal-toggle="reset-modal"
                onclick="resetLimit('{{ route('perawatan.reset-limit', ['uuid' => $b->uuid]) }}')"
                class="inline-flex text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600"
                type="button" title="Reset Sisa Limit">
                <i class="fa-solid fa-spinner"></i>
              </button>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>






  {{-- modal konfirmasi reset --}}
  <div id="reset-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <button type="button"
          class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
          data-modal-hide="reset-modal">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
        <div class="p-4 md:p-5 text-center">
          <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin mereset limit ?</h3>

          <form id="resetForm" method="POST">
            @csrf
            @method('PUT')
            <button type="submit"
              class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
              Ya
            </button>
            <button data-modal-hide="reset-modal" type="button"
              class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
              Tidak
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    function confirmDelete(url) {
      const form = document.getElementById('deleteForm');
      form.action = url;
    }

    function resetLimit(url) {
      const form = document.getElementById('resetForm');
      form.action = url;
    }
  </script>
@endsection
