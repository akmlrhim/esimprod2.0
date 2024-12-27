@extends('layouts.admin.main')

@section('content')
  <div class="flex p-3 ml-3 mr-3">
    @if (Route::currentRouteName() == 'peminjaman.search')
      @if ($peminjaman->isEmpty())
        <a href="{{ route('peminjaman.index') }}"
          class="mr-3 text-white bg-gray-700 hover:bg-gray-800 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
          Kembali
        </a>
      @endif
    @endif

    @foreach ($catatan as $c)
      <button data-id="{{ $c->id }}"
        class="edit-item text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
        Catatan
      </button>
    @endforeach
  </div>

  <div class="flex flex-col md:flex-row items-center lg:space-x-3 space-y-3 md:space-y-0 w-full p-3 mr-6 ml-3">
    <form class="flex items-center w-80 justify-center" action="{{ route('peminjaman.search') }}" method="GET">
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


  @if ($peminjaman->isEmpty())
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
          <thead class="text-md text-gray-700 capitalize bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-bold">
            <tr>
              <th scope="col" class="px-6 py-3 text-center">No.</th>
              <th scope="col" class="px-6 py-3 text-center">Kode peminjaman</th>
              <th scope="col" class="px-6 py-3 text-center">Nomor peminjaman</th>
              <th scope="col" class="px-6 py-3 text-center">Nomor Surat</th>
              <th scope="col" class="px-6 py-3 text-center">Peruntukan</th>
              <th scope="col" class="px-6 py-3 text-center">Tanggal Peminjaman</th>
              <th scope="col" class="px-6 py-3 text-center">Status</th>
              <th scope="col" class="px-6 py-3 text-center">Laporan</th>
              <th scope="col" class="px-6 py-3 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($peminjaman as $row)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                  {{ $peminjaman->firstItem() + $loop->index }}
                </th>
                <td class="px-6 py-4 text-center font-medium">{{ $row->kode_peminjaman }}</td>
                <td class="px-6 py-4 text-center font-medium">{{ $row->nomor_peminjaman }}</td>
                <td class="px-6 py-4 text-center">{{ $row->nomor_surat }}</td>

                <td class="px-6 py-4 text-center">{{ $row->peruntukan->peruntukan }}</td>
                <td class="px-6 py-4 text-center">{{ date('d F Y', strtotime($row->tanggal_peminjaman)) }}</td>
                <td class="px-6 py-4 text-center">
                  @if ($row->status == 'Proses')
                    <span
                      class="inline-flex items-center px-3 py-1 text-sm font-medium text-yellow-800 bg-yellow-100 rounded-full">
                      Proses
                    </span>
                  @elseif($row->status == 'Selesai')
                    <span
                      class="inline-flex items-center px-3 py-1 text-sm font-medium text-green-800 bg-green-100 rounded-full">
                      Selesai
                    </span>
                  @else
                    <span
                      class="inline-flex items-center px-3 py-1 text-sm font-medium text-gray-800 bg-gray-100 rounded-full">
                      T
                    </span>
                  @endif
                </td>
                <td class="px-6 py-4 text-center"><a href="{{ route('peminjaman.print', $row->uuid) }}" target="_blank"
                    class="text-white bg-blue-700 hover:bg-blue-500 font-medium rounded-lg text-sm px-2 py-1">Lihat
                  </a>
                </td>

                <td class="px-6 py-4 text-center">
                  <a href="{{ route('peminjaman.show', $row->uuid) }}"
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
    {{ $peminjaman->links() }}
  </div>

  {{-- modal edit catatan --}}
  <div id="edit-modal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50 font-sans backdrop-blur-sm">
    <div class="flex items-center justify-center min-h-screen">
      <div class="bg-white rounded-lg shadow-xl w-full max-w-xl">
        <div class="flex items-center justify-between p-4 border-b">
          <h3 class="text-lg font-semibold text-gray-900">Edit Catatan</h3>
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
            <input type="hidden" id="id" name="id">
            <div class="space-y-4">
              <div>
                <label for="isi_catatan" class="block text-sm font-medium text-gray-900">Catatan</label>
                <div id="editor" class="mt-2 border border-gray-300 h-40"></div>
                <input type="hidden" name="isi_catatan" id="isi_catatan">
                <div class="text-red-500 text-sm mt-1" id="error-isi_catatan"></div>
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


@endsection

@section('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const modal = document.getElementById('edit-modal');
      const editButtons = document.querySelectorAll('.edit-item');
      const closeButtons = document.querySelectorAll('.close-modal');
      const form = document.getElementById('updateForm');

      var quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'Tulis catatan disini...',
        modules: {
          toolbar: [
            [{
              header: "1"
            }, {
              header: "2"
            }, {
              font: []
            }],
            [{
              list: "ordered"
            }, {
              list: "bullet"
            }],
            ["bold", "italic", "underline"],
            ["link"],
            ["blockquote"],
            [{
              align: []
            }],
            ["clean"],
          ],
        },
      });

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
          const id = this.getAttribute('data-id');
          fetchItemData(id);
          modal.style.display = 'block';
        });
      });

      closeButtons.forEach(button => {
        button.addEventListener('click', function() {
          modal.style.display = 'none';
          clearErrors();
        });
      });

      function fetchItemData(id) {
        fetch(`/peminjaman/catatan/edit/${id}`)
          .then(response => response.json())
          .then(data => {
            document.getElementById('id').value = id;
            if (data.success === false) {
              alert(data.message);
              return;
            }
            quill.root.innerHTML = data.isi_catatan;
          });
      }

      form.addEventListener('submit', function(event) {
        event.preventDefault();
        clearErrors();

        const isi_catatan = quill.root.innerHTML.trim();

        if (isi_catatan === "" || isi_catatan === "<p><br></p>") {
          displayErrors({
            'isi_catatan': ['Catatan tidak boleh kosong']
          });
          return;
        }

        const formData = new FormData(form);
        const id = form['id'].value;
        formData.set('isi_catatan', isi_catatan);

        fetch(`/peminjaman/catatan/update/${id}`, {
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
  </script>
@endsection
