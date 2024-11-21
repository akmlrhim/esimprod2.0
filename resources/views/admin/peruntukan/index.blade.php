@extends('layouts.admin.main')

@section('content')
  <div class="flex p-3 ml-3 mr-3">
    <button data-modal-target="create-modal" data-modal-toggle="create-modal"
      class="mr-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
      Tambah Data
    </button>
  </div>

  {{-- search form --}}
  <form class="flex items-center max-w-sm mx-auto p-3 ml-3" action="{{ route('peruntukan.search') }}" method="GET">
    <label for="simple-search" class="sr-only">Search</label>
    <div class="w-full relative">
      <input type="text" id="search" autocomplete="off"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Masukkan kata kunci...." name="search" />
      <svg class="w-4 h-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-tvri_base_color" aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="m19 19-4-4m0-7A7 7 0 1 1   1 8a7 7 0 0 1 14 0Z" />
      </svg>
    </div>
  </form>


  @if ($peruntukan->isEmpty())
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
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-bold">
            <tr>
              <th scope="col" class="px-6 py-3">No.</th>
              <th scope="col" class="px-6 py-3">Peruntukan</th>
              <th scope="col" class="px-6 py-3">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($peruntukan as $row)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $peruntukan->firstItem() + $loop->index }}</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{!! $row->peruntukan !!}
                </td>
                <td class="flex items-center px-6 py-4">
                  <button type="button" data-uuid="{{ $row->uuid }}"
                    class="edit-item font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                  <button data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                    onclick="confirmDelete('{{ route('peruntukan.destroy', ['uuid' => $row->uuid]) }}')"
                    class="font-medium text-red-600 dark:text-red-500 hover:underline ml-2" type="button">
                    Hapus
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @endif

  <div class="p-3 ml-6 mr-1">
    {{ $peruntukan->links() }}
  </div>

  {{-- modal tambah data  --}}
  <div id="create-modal" tabindex="-1" aria-hidden="true"
    class="{{ session('showModal') || $errors->any() ? 'flex' : 'hidden' }} overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm">
    <div class="relative p-4 w-full max-w-md max-h-full font-sans">
      <div class="relative bg-white rounded-lg shadow-xl border-gray-400 dark:bg-gray-700">
        <div class="flex items-center justify-between p-3 md:p-4 border-b rounded-t dark:border-gray-600">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            Tambah Peruntukan
          </h3>
          <button type="button"
            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="create-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <div class="p-4">
          <form action="{{ route('peruntukan.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
              <div>
                <label for="peruntukan" class="block text-sm font-medium text-gray-900">Peruntukan</label>
                <input type="text" name="peruntukan" id="peruntukan" autocomplete="off"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 mb-2" />
                @error('peruntukan')
                  <small class="text-red-500 text-sm"> {{ $message }}</small>
                @enderror
              </div>
            </div>
            <button type="submit"
              class="w-full mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan
              Data</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- edit modal  --}}
  <div id="edit-modal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50 font-sans backdrop-blur-sm">
    <div class="flex items-center justify-center min-h-screen">
      <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
        <div class="flex items-center justify-between p-4 border-b">
          <h3 class="text-lg font-semibold text-gray-900">Edit Peruntukan</h3>
          <button type="button" class="text-gray-400 hover:text-gray-900 close-modal">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>

        <div class="p-4">
          <form id="updateForm">
            @csrf
            @method('PUT')
            <input type="hidden" id="peruntukan_uuid" name="uuid">
            <div class="space-y-4">
              <div>
                <label for="peruntukan" class="block text-sm font-medium text-gray-900">Peruntukan</label>
                <input type="text" name="peruntukan" id="peruntukan" autocomplete="off"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2">
                <div class="text-red-500 text-sm mt-1" id="error-peruntukan"></div>
              </div>
            </div>

            <div class="flex justify-end mt-6">
              <button type="submit"
                class="px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Simpan
                Data</button>
              <button type="button" class="btn ml-2 px-4 py-2 bg-gray-200 close-modal">Kembali</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- modal konfirmasi hapus ? --}}
  <div id="delete-modal" tabindex="-1"
    class="font-sans hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm">
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
    document.addEventListener('DOMContentLoaded', function() {
      @if ($errors->any() || session('showModal'))
        document.getElementById('create-modal').classList.remove('hidden');
        document.getElementById('create-modal').classList.add('flex');
      @endif

      const modal = document.getElementById('edit-modal');
      const editButtons = document.querySelectorAll('.edit-item');
      const closeButtons = document.querySelectorAll('.close-modal');
      const form = document.getElementById('updateForm');

      function displayErrors(errors) {
        Object.keys(errors).forEach(function(field) {
          const errorContainer = document.getElementById(`error-${field}`);
          if (errorContainer) {
            errorContainer.textContent = errors[field][0];
          }
        });
      }

      function clearErrors() {
        const errorFields = document.querySelectorAll('[id^="error-"]');
        errorFields.forEach(function(errorField) {
          errorField.textContent = '';
        });
      }

      editButtons.forEach(button => {
        button.addEventListener('click', function() {
          const uuid = this.getAttribute('data-uuid');
          fetchItemData(uuid);
          modal.style.display = 'block';
        });
      });

      closeButtons.forEach(button => {
        button.addEventListener('click', function() {
          modal.style.display = 'none';
          clearErrors();
        });
      });

      function fetchItemData(uuid) {
        fetch(`/peruntukan/edit/${uuid}`)
          .then(response => response.json())
          .then(data => {
            document.getElementById('peruntukan_uuid').value = uuid;
            form['peruntukan'].value = data.peruntukan;
          });
      }

      form.addEventListener('submit', function(event) {
        event.preventDefault();
        clearErrors();

        const formData = new FormData(form);
        const uuid = form['peruntukan_uuid'].value;

        fetch(`/peruntukan/update/${uuid}`, {
            method: 'POST',
            body: formData,
            headers: {
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
              'Accept': 'application/json',
            }
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              setTimeout(function() {
                location.reload();
              }, 1000);
              clearErrors();
            } else {
              displayErrors(data.errors);
            }
          })
          .catch(error => {
            console.log('An error occurred:', error);
          });
      });

    });

    document.querySelector('[data-modal-hide="create-modal"]').addEventListener('click', function() {
      document.getElementById('create-modal').classList.add('hidden');
      document.getElementById('create-modal').classList.remove('flex');
    });


    // hapus
    function confirmDelete(url) {
      const form = document.getElementById('deleteForm');
      form.action = url;
    }
  </script>
@endsection
