@extends('layouts.admin.main')
@section('content')
  <div class="-m-1.5 overflow-x-auto ml-5 mr-3">
    <div class="p-1.5 min-w-full inline-block align-middle">

      @error('isi_catatan')
        <div id="alert-2"
          class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
          role="alert">
          <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
              d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
          </svg>
          <span class="sr-only">Info</span>
          <div class="ms-3 text-sm font-medium">
            {{ $message }}
          </div>
          <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
            data-dismiss-target="#alert-2" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
          </button>
        </div>
      @enderror


      <div class="border rounded-lg shadow overflow-hidden dark:border-neutral-700">
        <div class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
          <div class="container mx-auto p-4">
            <form action="{{ route('peminjaman.catatan.update', $catatan->id) }}" method="POST"
              enctype="multipart/form-data">
              @method('PATCH')
              @csrf
              <div class="flex flex-col space-y-4">
                <div>
                  <label class="block text-sm font-bold text-black mb-3">Catatan</label>
                  <textarea id="editor" name="isi_catatan">{{ old('isi_catatan', $catatan->isi_catatan) }}</textarea>
                </div>
              </div>

              <div class="mt-4">
                <a href="{{ route('peminjaman.index') }}"
                  class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Kembali</a>
                <button type="submit"
                  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan
                  Data</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
