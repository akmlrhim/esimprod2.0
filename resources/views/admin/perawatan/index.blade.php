@extends('layouts.admin.main')
@section('content')
  <div class="flex items-center justify-between p-3 ml-3 mr-3">
    <button id="dropdownRightButton" data-dropdown-toggle="dropdownRight" data-dropdown-placement="right"
      class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  rounded-lg text-sm px-2 py-1 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 font-bold"
      type="button" title="Menu"><i class="fa solid fa-gear mr-2"></i> Opsi
    </button>

    <div id="dropdownRight" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-56 dark:bg-gray-700">
      <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
        <li>
          <a href="{{ route('perawatan.create') }}"
            class="block px-3 py-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
            Tambah Perawatan
          </a>
        </li>
        <li>
          <a href="{{ route('perawatan.barang') }}"
            class="block px-3 py-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
            Data Barang yang Tidak Tersedia
          </a>
        </li>
        <li>
          <a href="#" class="block px-3 py-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
            Cetak Data
          </a>
        </li>
      </ul>
    </div>
  </div>

  @if (!$perawatan->isEmpty())
    <div class="p-3 ml-3 mr-3 ">
      {{ $perawatan->links() }}
    </div>
  @endif


  @if ($perawatan->isEmpty())
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

  {{-- data perawatan barang  --}}
  <div class="p-3 ml-3 mr-3">
    <div class="relative overflow-hidden shadow-md sm:rounded-lg">
      <div class="pb-4 bg-white dark:bg-gray-900">
        <form action="" method="get">
          @csrf
          <label for="table-search" class="sr-only">Search</label>
          <div class="relative mt-3 ml-3">
            <input type="text" id="table-search"
              class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full max-w-xs bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Search for items" />
          </div>
        </form>
      </div>
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 justify-center items-center">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">Kode Perawatan</th>
            <th scope="col" class="px-6 py-3">Nama Barang</th>
            <th scope="col" class="px-6 py-3">Jenis Barang</th>
            <th scope="col" class="px-6 py-3">Jenis Perawatan</th>
            <th scope="col" class="px-6 py-3">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b border-gray-200 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              Apple MacBook Pro 17"
            </th>
            <td class="px-6 py-4"><a href=""
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Kode Barang</a></td>
            <td class="px-6 py-4">Silver</td>
            <td class="px-6 py-4">$2999</td>
            <td class="px-6 py-4">
              <a href="#"
                class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-2 py-1 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800"
                title="Tandai Selesai"><i class="fa-solid fa-check"></i></a>

              <a href="#"
                class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-2 py-1 text-center dark:border-yellow-500 dark:text-yellow-500 dark:hover:text-white dark:hover:bg-yellow-600 dark:focus:ring-yellow-800"
                title="Edit"><i class="fa-solid fa-pen"></i></a>

              <a href="#"
                class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-2 py-1 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800"
                title="Hapus"><i class="fa-solid fa-trash"></i></a>

            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
@endsection

@section('scripts')
  <script></script>
@endsection
