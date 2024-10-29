@extends('layouts.admin.main')

@section('content')
<<<<<<< HEAD
  <div class="flex p-3 ml-3 mr-3">
    <a href="{{ route('barang.index') }}"
      class="mr-2 text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none font-bold rounded-lg text-xs text-center px-3 py-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
      type="button">
      Kembali
    </a>
    <button data-modal-target="create-modal" data-modal-toggle="create-modal"
      class="mr-3 text-blue-900 hover:text-white border border-blue-800 hover:bg-blue-900  focus:outline-none font-bold rounded-lg text-xs text-center px-3 py-2 dark:border-blue-600 dark:text-blue-400 dark:hover:text-white dark:hover:bg-blue-600 ">
      Tambah Jenis Barang
    </button>
  </div>


  <div class="flex flex-col p-3 ml-3 mr-3">



    {{-- data  --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-bold">
          <tr>
            <th scope="col" class="px-6 py-3">Kode</th>
            <th scope="col" class="px-6 py-3">Jenis Barang</th>
            <th scope="col" class="px-6 py-3">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($jenis_barang as $row)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $row->kode_jenis_barang }}
              </th>
              <td class="px-6 py-4">{{ $row->jenis_barang }}</td>
              <td class="flex items-center px-6 py-4">
                <button type="button" data-uuid="{{ $row->uuid }}"
                  class="edit-item font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                <button data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                  onclick="confirmDelete('{{ route('jenis_barang.destroy', ['uuid' => $row->uuid]) }}')"
                  class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3" type="button">
                  Delete
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  {{-- modal tambah data  --}}
  <div id="create-modal" tabindex="-1" aria-hidden="true"
    class="{{ session('showModal') || $errors->any() ? 'flex' : 'hidden' }} overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow-xl border-gray-400 dark:bg-gray-700">
        <div class="flex items-center justify-between p-3 md:p-4 border-b rounded-t dark:border-gray-600">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            Tambah Jenis Barang
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
          <form action="{{ route('jenis_barang.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
              <div>
                <label for="uuid" class="block text-sm font-medium text-gray-900">Kode Barang</label>
                <input type="text" name="kode_jenis_barang" id="kode_jenis_barang"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2" />
                @error('kode_jenis_barang')
                  <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                @enderror
              </div>

              <div>
                <label for="jenis_barang" class="block text-sm font-medium text-gray-900">Jenis Barang</label>
                <input type="text" name="jenis_barang" id="jenis_barang"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2" />
                @error('jenis_barang')
                  <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
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
  <div id="edit-modal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50">
    <div class="flex items-center justify-center min-h-screen">
      <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
        <div class="flex items-center justify-between p-4 border-b">
          <h3 class="text-lg font-semibold text-gray-900">Edit Jenis Barang</h3>
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
            <input type="hidden" id="jenis_barang_uuid" name="uuid">

            <div class="space-y-4">
              <div>
                <label for="uuid" class="block text-sm font-medium text-gray-900">Kode Barang</label>
                <input type="text" name="kode_jenis_barang" id="kode_jenis_barang"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2">
                <div class="text-red-500 text-sm mt-1" id="error-kode_jenis_barang"></div>
              </div>

              <div>
                <label for="jenis_barang" class="block text-sm font-medium text-gray-900">Jenis Barang</label>
                <input type="text" name="jenis_barang" id="jenis_barang"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2">
                <div class="text-red-500 text-sm mt-1" id="error-jenis_barang"></div>
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
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
              class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
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
        fetch(`/jenis_barang/edit/${uuid}`)
          .then(response => response.json())
          .then(data => {
            document.getElementById('jenis_barang_uuid').value = uuid;
            form['kode_jenis_barang'].value = data.kode_jenis_barang;
            form['jenis_barang'].value = data.jenis_barang;
          });
      }

      form.addEventListener('submit', function(event) {
        event.preventDefault();
        clearErrors();

        const formData = new FormData(form);
        const uuid = form['jenis_barang_uuid'].value;

        fetch(`/jenis_barang/update/${uuid}`, {
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
=======
  <table id="search-table">
    <thead>
      <tr>
        <th>
          <span class="flex items-center">
            Company Name
          </span>
        </th>
        <th>
          <span class="flex items-center">
            Ticker
          </span>
        </th>
        <th>
          <span class="flex items-center">
            Stock Price
          </span>
        </th>
        <th>
          <span class="flex items-center">
            Market Capitalization
          </span>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Apple Inc.</td>
        <td>AAPL</td>
        <td>$192.58</td>
        <td>$3.04T</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Microsoft Corporation</td>
        <td>MSFT</td>
        <td>$340.54</td>
        <td>$2.56T</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Alphabet Inc.</td>
        <td>GOOGL</td>
        <td>$134.12</td>
        <td>$1.72T</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Amazon.com Inc.</td>
        <td>AMZN</td>
        <td>$138.01</td>
        <td>$1.42T</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">NVIDIA Corporation</td>
        <td>NVDA</td>
        <td>$466.19</td>
        <td>$1.16T</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Tesla Inc.</td>
        <td>TSLA</td>
        <td>$255.98</td>
        <td>$811.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Meta Platforms Inc.</td>
        <td>META</td>
        <td>$311.71</td>
        <td>$816.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Berkshire Hathaway Inc.</td>
        <td>BRK.B</td>
        <td>$354.08</td>
        <td>$783.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">TSMC</td>
        <td>TSM</td>
        <td>$103.51</td>
        <td>$538.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">UnitedHealth Group Incorporated</td>
        <td>UNH</td>
        <td>$501.96</td>
        <td>$466.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Johnson & Johnson</td>
        <td>JNJ</td>
        <td>$172.85</td>
        <td>$452.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">JPMorgan Chase & Co.</td>
        <td>JPM</td>
        <td>$150.23</td>
        <td>$431.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Visa Inc.</td>
        <td>V</td>
        <td>$246.39</td>
        <td>$519.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Eli Lilly and Company</td>
        <td>LLY</td>
        <td>$582.97</td>
        <td>$552.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Walmart Inc.</td>
        <td>WMT</td>
        <td>$159.67</td>
        <td>$429.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Samsung Electronics Co., Ltd.</td>
        <td>005930.KS</td>
        <td>$70.22</td>
        <td>$429.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Procter & Gamble Co.</td>
        <td>PG</td>
        <td>$156.47</td>
        <td>$366.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Nestlé S.A.</td>
        <td>NESN.SW</td>
        <td>$120.51</td>
        <td>$338.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Roche Holding AG</td>
        <td>ROG.SW</td>
        <td>$296.00</td>
        <td>$317.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Chevron Corporation</td>
        <td>CVX</td>
        <td>$160.92</td>
        <td>$310.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">LVMH Moët Hennessy Louis Vuitton</td>
        <td>MC.PA</td>
        <td>$956.60</td>
        <td>$478.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Pfizer Inc.</td>
        <td>PFE</td>
        <td>$35.95</td>
        <td>$200.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Novo Nordisk A/S</td>
        <td>NVO</td>
        <td>$189.15</td>
        <td>$443.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">PepsiCo, Inc.</td>
        <td>PEP</td>
        <td>$182.56</td>
        <td>$311.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">ASML Holding N.V.</td>
        <td>ASML</td>
        <td>$665.72</td>
        <td>$273.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">The Coca-Cola Company</td>
        <td>KO</td>
        <td>$61.37</td>
        <td>$265.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Oracle Corporation</td>
        <td>ORCL</td>
        <td>$118.36</td>
        <td>$319.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Merck & Co., Inc.</td>
        <td>MRK</td>
        <td>$109.12</td>
        <td>$276.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Broadcom Inc.</td>
        <td>AVGO</td>
        <td>$861.80</td>
        <td>$356.00B</td>
      </tr>
      <tr>
        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Mastercard Incorporated</td>
        <td>MA</td>
        <td>$421.44</td>
        <td>$396.00B</td>
      </tr>
    </tbody>
  </table>
@endsection

@section('scripts')
>>>>>>> 1f47649 (fix)
@endsection
