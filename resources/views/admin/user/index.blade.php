@extends('layouts.admin.main')

@section('content')
  <div class="flex p-3 ml-3 mr-3">
    <a href="{{ route('users.create') }}"
      class="mr-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
      Tambah User
    </a>
  </div>


  @if (!$user->isEmpty())
    <div class="flex items-center space-x-3 w-full p-3 ml-3">
      <form class="flex items-center w-1/3 justify-center">
        <div class="w-full relative">
          <input type="text" id="search" autocomplete="off"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Masukkan kata kunci, + Enter" required name="search" />
          <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-tvri_base_color" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
          </svg>
        </div>
      </form>

      <form class="flex items-center w-1/3 justify-center" action="{{ route('users.role') }}" method="GET">
        <div class="w-full flex items-center space-x-2">
          <select id="role" name="role"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>-- Pilih Role, tekan Cari --</option>
            <option value="Superadmin">Superadmin</option>
            <option value="Admin">Admin</option>
            <option value="User">User</option>
          </select>
          <button
            class="text-white bg-tvri_base_color hover:bg-tvri_base_color focus:outline-none focus:ring-tvri_base_color font-medium rounded-lg text-sm px-3 py-2"
            type="submit">Cari</button>
        </div>
      </form>
    </div>
  @endif


  @if ($user->isEmpty())
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
    <div class="flex flex-col p-3 ml-3">
      <div class="relative overflow-x-auto sm:rounded-lg border rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-bold">
            <tr>
              <th scope="col" class="px-6 py-3 text-center">No.</th>
              <th scope="col" class="px-6 py-3 text-center">Kode User</th>
              <th scope="col" class="px-6 py-3 text-center">Nama Lengkap</th>
              <th scope="col" class="px-6 py-3 text-center">Role</th>
              <th scope="col" class="px-6 py-3 text-center">Jabatan</th>
              <th scope="col" class="px-6 py-3 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $row)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                  {{ $user->firstItem() + $loop->index }}
                </th>
                <td class="px-6 py-4 text-center">{!! $row->kode_user !!}</td>
                <td class="px-6 py-4 text-center">{!! $row->nama_lengkap !!}</td>
                <td class="px-6 py-4 text-center">
                  @if ($row->role == 'admin')
                    <span
                      class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Admin</span>
                  @elseif($row->role == 'superadmin')
                    <span
                      class="bg-green-100 text-green-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Superadmin</span>
                  @else
                    <span
                      class="bg-red-100 text-red-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">User</span>
                  @endif
                </td>
                <td class="px-6 py-4 text-center">{!! $row->jabatan !!}</td>
                <td class="flex items-center px-6 py-4 justify-center space-x-2">
                  <button type="button" data-uuid="{{ $row->uuid }}"
                    class="edit-item focus:outline-none text-white bg-green-400 hover:bg-green-500 font-medium rounded-lg text-sm px-2 py-1"
                    title="Detail">
                    <i class="fas fa-info-circle"></i>
                  </button>

                  <a href="{{ route('users.edit', $row->uuid) }}"
                    class="edit-item focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 font-medium rounded-lg text-sm px-2 py-1"
                    title="Ubah">
                    <i class="fas fa-edit"></i>
                  </a>

                  <button data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                    onclick="confirmDelete('{{ route('users.destroy', ['uuid' => $row->uuid]) }}')"
                    class="focus:outline-none text-white bg-red-600 hover:bg-red-500 font-medium rounded-lg text-sm px-2 py-1"
                    type="button" title="Hapus">
                    <i class="fas fa-trash-alt"></i>
                  </button>

                  <button data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                    onclick="confirmDelete('{{ route('users.destroy', ['uuid' => $row->uuid]) }}')"
                    class="focus:outline-none text-white bg-black hover:bg-gray-800 font-medium rounded-lg text-sm px-2 py-1"
                    type="button" title="Cetak ID Card">
                    <i class="fas fa-print"></i>
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @endif

  <div class="p-3 ml-3 mr-3">
    {{ $user->links() }}
  </div>


  {{-- modal konfirmasi hapus ? --}}
  <div id="delete-modal" tabindex="-1"
    class="font-aptos hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <button type="button"
          class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
          data-modal-hide="delete-modal">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 14 14">
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
          <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin menghapus data ?</h3>

          <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
              class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
              Ya
            </button>
            <button data-modal-hide="delete-modal" type="button"
              class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
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
  </script>
@endsection
