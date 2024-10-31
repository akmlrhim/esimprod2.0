@extends('layouts.admin.main')
@section('content')
  <div class="flex p-3 ml-3 mr-3">
    <a href="{{ route('barang.index') }}"
      class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none font-bold rounded-lg text-sm text-center px-5 py-2.5 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
      type="button">
      Kembali
    </a>
  </div>

  <div class="flex flex-col ml-3 sm:ml-2">
    <div class="gap-16 items-center py-6 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">

      <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ $barang->nama_barang }}
        </h2>

        <p>{{ $barang->deskripsi }}</p>

        <table
          class="mb-4 mt-3 w-full text-left text-gray-500 dark:text-gray-400 border border-gray-200 dark:border-gray-700 rounded-xl shadow-xl overflow-hidden">
          <tbody>
            <tr class="dark:bg-gray-800">
              <td class="px-4 p y-2 font-semibold text-gray-900 dark:text-white">Jenis Barang</td>
              <td class="px-4 py-2">{{ $barang->jenisBarang->jenis_barang }}</td>
            </tr>
            <tr>
              <td class="px-4 py-2 font-semibold text-gray-900 dark:text-white">Kode</td>
              <td class="px-4 py-2">{{ $barang->uuid }}</td>
            </tr>
            <tr class="dark:bg-gray-800">
              <td class="px-4 py-2 font-semibold text-gray-900 dark:text-white">Limit</td>
              <td class="px-4 py-2">{{ $barang->limit }}</td>
            </tr>
            <tr>
              <td class="px-4 py-2 font-semibold text-gray-900 dark:text-white">Sisa Limit</td>
              <td class="px-4 py-2">{{ $barang->sisa_limit }}</td>
            </tr>
            <tr class="dark:bg-gray-800">
              <td class="px-4 py-2 font-semibold text-gray-900 dark:text-white">Status</td>
              <td class="px-4 py-2">
                @if ($barang->status == 'Tersedia')
                  <span
                    class="bg-green-500 text-white text-sm font-semibold px-2 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Tersedia</span>
                @else
                  <span
                    class="bg-red-500 text-white text-sm font-semibold px-2 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Habis</span>
                @endif
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="mt-8 order-first lg:order-none">
        <img class="w-3/4 h-auto rounded-lg shadow-lg mx-auto"
          src="{{ asset('storage/uploads/foto_barang/' . $barang->foto) }}" alt="Image Description" />
      </div>
    </div>

    <div class="flex justify-center mt-6">
      <div
        class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg p-4 text-center max-w-xs">
        <p class="text-gray-600 dark:text-gray-400 text-xs font-semibold">Dibuat :
          {{ $barang->created_at->diffForHumans() }}</p>

        <p class="text-gray-600 dark:text-gray-400 text-xs font-semibold mt-2">Diperbarui :
          {{ $barang->updated_at->diffForHumans() }} </p>
      </div>
    </div>
  </div>
@endsection
