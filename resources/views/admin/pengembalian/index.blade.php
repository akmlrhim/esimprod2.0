@extends('layouts.admin.main')

@section('content')
  <div class="flex p-3 ml-3 mr-3">
    @if (Route::currentRouteName() == 'pengembalian.search')
      @if ($pengembalian->isEmpty())
        <a href="{{ route('pengembalian.index') }}"
          class="mr-3 text-white bg-gray-700 hover:bg-gray-800 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
          Kembali
        </a>
      @endif
    @endif
  </div>


  <div class="flex flex-col md:flex-row items-center lg:space-x-3 space-y-3 md:space-y-0 w-full p-3 mr-6 ml-3">
    <form class="flex items-center w-80 justify-center" action="{{ route('pengembalian.search') }}" method="GET">
      <div class="w-full relative flex">
        <input type="text" id="search" autocomplete="off"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Masukkan Kode Peminjaman + Enter" name="search" />
        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-tvri_base_color" aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>
      </div>
    </form>
  </div>


  @if ($pengembalian->isEmpty())
    <x-empty-data></x-empty-data>
  @else
    <div class="flex flex-col p-3 ml-3">
      <div class="relative overflow-x-auto sm:rounded-lg border rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-md text-gray-700 capitalize bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-bold">
            <tr>
              <th scope="col" class="px-6 py-3 text-center">No.</th>
              <th scope="col" class="px-6 py-3 text-center">Kode Pengembalian</th>
              <th scope="col" class="px-6 py-3 text-center">Kode Peminjaman</th>
              <th scope="col" class="px-6 py-3 text-center">Tanggal Kembali</th>
              <th scope="col" class="px-6 py-3 text-center">Peminjam</th>
              <th scope="col" class="px-6 py-3 text-center">Status</th>
              <th scope="col" class="px-6 py-3 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pengembalian as $row)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                  {{ $pengembalian->firstItem() + $loop->index }}
                </th>
                <td class="px-6 py-4 text-center font-medium">{{ $row->kode_pengembalian }}</td>
                <td class="px-6 py-4 text-center">{{ $row->kode_peminjaman }}</td>
                <td class="px-6 py-4 text-center">{{ date('d F Y', strtotime($row->tanggal_kembali)) }}</td>
                <td class="px-6 py-4 text-center">{{ $row->peminjam }}</td>
                <td class="px-6 py-4 text-center">
                  @if ($row->status == 'Tidak Lengkap')
                    <span
                      class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"><i
                        class="fa-solid fa-circle-xmark mr-2"></i>Tidak Lengkap</span>
                  @else
                    <span
                      class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300"><i
                        class="fa-solid fa-circle-check mr-2"></i>Lengkap</span>
                  @endif
                </td>

                <td class="flex items-center px-6 py-4 justify-center space-x-2">
                  <a href="{{ route('pengembalian.show', ['uuid' => $row->uuid]) }}"
                    class="text-white bg-yellow-300 hover:bg-yellow-500 font-medium rounded-lg text-sm px-2 py-1">Detail</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @endif

  <div class="p-3 ml-3">
    {{ $pengembalian->links() }}
  </div>

@endsection
