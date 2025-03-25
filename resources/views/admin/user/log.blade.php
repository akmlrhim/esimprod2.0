@extends('layouts.admin.main')

@section('content')
  <div class="flex p-3 ml-3 mr-3">
    <a href="{{ route('users.index') }}"
      class="mr-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
      type="button">
      Kembali
    </a>
  </div>

  @if ($logs->isEmpty())
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
  @else
    <div class="ml-3 mr-3 p-3">
      <div class="bg-white rounded-lg">
        <div class="relative overflow-x-auto">
          <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-black uppercase bg-gray-100">
              <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Waktu Login</th>
                <th scope="col" class="px-6 py-3">Gambar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($logs as $key => $log)
                <tr class="bg-white border-b">
                  <td class="px-6 py-4 font-medium text-gray-900">{{ $key + 1 }}</td>
                  <td class="px-6 py-4 text-gray-700">
                    {{ \Carbon\Carbon::parse($log->waktu_login)->translatedFormat('d M Y, H:i:s') }}
                  </td>
                  <td class="px-6 py-4">
                    @if ($log->gambar)
                      <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-3 py-1 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        data-image="{{ basename($log->gambar) }}">
                        Lihat
                      </button>
                    @else
                      <span class="text-red-600">Tidak ada gambar</span>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  @endif

  <div class="p-3 ml-3 mr-3">
    {{ $logs->links() }}
  </div>

  <div id="default-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Gambar
          </h3>
          <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="default-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <div class="p-4 md:p-5 space-y-4">
          <img id="modalImage" src="" alt="Login Image" class="w-full h-auto rounded">
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const modalImage = document.getElementById('modalImage');
      const buttons = document.querySelectorAll('[data-modal-target="default-modal"]');

      buttons.forEach(button => {
        button.addEventListener('click', function() {
          const imageUrl = '{{ asset('storage/login/') }}/' + this.dataset.image;
          modalImage.src = imageUrl;
        });
      });
    });
  </script>
@endsection
