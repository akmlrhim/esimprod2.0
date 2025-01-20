@extends('layouts.admin.main')

@section('content')
  <div class="p-3 ml-3 mr-3 flex flex-col md:flex-row md:space-x-4">
    {{-- table  --}}
    <div
      class="w-full md:w-2/3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 self-start">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
        Riwayat</h5>
      @if ($guideBook->isEmpty())
        <small class="text-red-500">Tidak ada riwayat</small>
      @else
        <div class="relative overflow-x-auto">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                  No
                </th>
                <th scope="col" class="px-6 py-3">
                  File
                </th>
                <th scope="col" class="px-6 py-3">
                  Status
                </th>
                <th scope="col" class="px-6 py-3">
                  Dibuat
                </th>
                <th scope="col" class="px-6 py-3">
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($guideBook as $book)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                  </th>
                  <td class="px-6 py-4">
                    <button data-modal-target="fileModal{{ $book->id }}"
                      data-modal-toggle="fileModal{{ $book->id }}"
                      class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat File</button>
                  </td>
                  <td class="px-6 py-4">
                    {{ $book->status }}
                  </td>
                  <td class="px-6 py-4">
                    {{ $book->created_at->diffForHumans() }}
                  </td>
                </tr>

                {{-- modal file  --}}
                <div id="fileModal{{ $book->id }}" tabindex="-1" aria-hidden="true"
                  class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                  <div class="relative w-full max-w-2xl max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                      <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                          File
                        </h3>
                        <button type="button"
                          class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                          data-modal-hide="fileModal{{ $book->id }}">
                          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                          </svg>
                          <span class="sr-only">Close modal</span>
                        </button>
                      </div>
                      <div class="p-6 -space-y-14">
                        <iframe src="{{ asset('storage/uploads/guidebook/' . $book->file) }}" class="w-full h-96"
                          frameborder="0"></iframe>
                      </div>
                      <div
                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="fileModal{{ $book->id }}" type="button"
                          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                          Tutup
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- end modal  --}}
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>

    {{-- form input  --}}
    <div
      class="w-full md:w-1/3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-4 md:mb-0 self-start">
      <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
        Upload Buku Panduan</h5>
      <form action="{{ route('buku_panduan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
          <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            id="file_input" type="file" name="file" />
          @error('file')
            <small class="text-red-500 text-sm">{{ $message }}</small>
          @enderror
        </div>
        <button type="submit"
          class=" mt-4 px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Upload</button>
      </form>
    </div>
  </div>
@endsection
