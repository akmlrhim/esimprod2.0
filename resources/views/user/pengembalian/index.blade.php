@extends('layouts.user.main')

@section('title', 'ESIMPROD | PENGEMBALIAN')

@section('content')

<div
  class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
  <div class="flex flex-col items-center pb-1">
    <img class="w-10 h-10 mb-3 rounded-full shadow-lg"
      src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Bonnie image" />
    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Akbar Laksana</h5>
    <span class="text-sm text-gray-500 dark:text-gray-400">199004232022031007</span>
    <span class="text-sm text-gray-500 dark:text-gray-400">Teknisi Siaran</span>
    <span class="text-sm text-gray-500 dark:text-gray-400">085386612234</span>
  </div>
</div>
<!-- Start coding here -->
<div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg mt-3">
  <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
    <div class="w-full md:w-1/2">
      <form class="flex items-center">
        <label for="simple-search" class="sr-only"></label>
        <div class="relative w-full">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
             <i class="fa-solid fa-file-lines w-1 h-5 text-gray-500 dark:text-gray-400"></i>
          </div>
          <input type="text" id="simple-search"
            class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            placeholder="{{ $peminjaman->nomor_surat }}" disabled>
        </div>
      </form>
    </div>
    <div class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
      <div class="flex items-center w-full space-x-3 md:w-auto">

        <!-- Datepickers -->
        <div id="date-range-picker" date-rangepicker class="flex items-center">
          <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
              </svg>
            </div>
            <input id="datepicker-range-start" datepicker datepicker-buttons datepicker-autoselect-today
              datepicker-min-date="today" datepicker-max-date="today" name="start" type="text"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="{{ \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->format('d F Y') }}" disabled>
          </div>
          <span class="mx-4 text-gray-500">sampai</span>
          <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
              </svg>
            </div>
            <input id="datepicker-range-end" datepicker datepicker-buttons datepicker-autoselect-today
              datepicker-min-date="today" name="end" type="text"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder=" {{ \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d F Y') }}" disabled>
          </div>
        </div>
        <input type="text" id="disabled-input" aria-label="disabled input"
            class="bg-gray-50 border border-gray-400 text-center text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-auto p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $peminjaman->peruntukan->peruntukan }}" disabled>
    </div>
  </div>
</div>

{{-- Barang --}}
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
  <!-- Added mt-4 here -->
  <div
    class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
  </div>
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="p-4">
          No
        </th>
        <th scope="col" class="px-6 py-3">
          Nama Barang
        </th>
        <th scope="col" class="px-6 py-3">
          Merk
        </th>
        <th scope="col" class="px-6 py-3">
          No Seri
        </th>
        <th scope="col" class="px-6 py-3">
          Kondisi
        </th>
          <th>
          </th>
      </tr>
    </thead>
      <tbody>
      @foreach($barang as $key => $item)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td class="w-4 p-4">
                  <div class="flex items-center">
                      <p>{{ $key + 1 }}</p>
                  </div>
              </td>
              <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                  <div class="ps-2">
                      <div class="text-base font-semibold">{{ $item['nama_barang'] }} </div>
                  </div>
              </th>
              <td>{{ $item['merk'] }}</td>
              <td class="px-6 py-4">
                  <div class="flex items-center">
                      {{ $item['nomor_seri'] }}"
                  </div>
              </td>
              <td class="px-6 py-4">
                  <div class="max-w-sm mx-auto">
                      <select id="item-conditions"
                              class="bg-gray-50 border border-gray-400 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-auto p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          <option selected value="baik">Baik</option>
                          <option value="rusak">Rusak</option>
                          <option value="cacat">Cacat</option>
                      </select>
                  </div>
              </td>
              <td>
                <input type="hidden" name="uuid" value="{{ $item['uuid'] }}" class="item-uuid" id="item-uuid">
                <input type="hidden" name="kodeBarang" value="{{ $item['kode_barang'] }}" class="item-code" id="item-code">
                <input id="bordered-checkbox-2" type="checkbox" value="" name="bordered-checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" data-code="{{ $item['kode_barang'] }}" disabled>
                <label for="bordered-checkbox-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
              </td>
          </tr>
      @endforeach
      </tbody>
  </table>
</div>
</div>
<div class="flex justify-center space-x-2 mt-4">
  <a href="{{ route('user.option') }}" type="button"
    class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kembali</a>
  <button type="button" data-modal-target="save-modal" data-modal-toggle="save-modal"
    class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
</div>

<!-- Toast Redundant Item -->
<div id="toast-danger"
  class="hidden items-center fixed bottom-9 right-5 w-full max-w-xs p-4 mb-4 border border-gray-400 text-gray-600 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
  role="alert">
  <div
    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-700 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
    <svg class="w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path
        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
    </svg>
    <span class="sr-only">Error icon</span>
  </div>
  <div class="ms-3 text-normal font-normal">Jangan meakal</div>
  <button type="button"
    class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-500 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
    data-dismiss-target="#toast-danger" aria-label="Close">
    <span class="sr-only">Close</span>
    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
    </svg>
  </button>
</div>

{{-- Save Modal Confirmation --}}
    <div id="save-modal" tabindex="-1"
      class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full">
      <div class="relative p-4 w-full max-w-md">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <button type="button"
            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="save-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
          <div class="p-4 md:p-5 text-center flex flex-col items-center">
            <svg class="mx-auto mb-2 text-gray-400 w-6 h-6 dark:text-gray-200" aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <h3 class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Simpan Data Pengembalian?</h3>
            <div id="submitPengembalian" class="flex justify-center space-x-2 mt-4">
              <button data-modal-hide="popup-modal" id="savePengembalian" type="button"
                class="text-white bg-blue-900 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                Ya
              </button>
              <button data-modal-hide="save-modal" type="button"
                class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                Tidak
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

{{--    Modal Success Pengembalian--}}
    <div id="successModal" tabindex="-1" aria-hidden="true" class="hidden fixed flex top-0 right-0 left-0 z-50 justify-center items-center w-full h-screen bg-black bg-opacity-50">
        <div class="relative p-4 w-full max-w-md bg-white rounded-lg shadow-md dark:bg-gray-800">
            {{-- Modal content --}}
            <div class="text-center">
                <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 p-2 flex items-center justify-center mx-auto mb-3.5">
                    <svg aria-hidden="true" class="w-8 h-8 text-green-500 dark:text-green-400" fill="currentColor"
                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Success</span>
                </div>
                <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Data Pengembalian Berhasil Di Simpan</p>
                <button id="to_report" type="button" onclick="redirectToReport()"
                        class="py-2 px-3 text-sm font-medium text-white bg-blue-900 hover:bg-blue-700 rounded-lg focus:ring-4 focus:outline-none dark:focus:ring-primary-900">
                    OK
                </button>
            </div>
        </div>
    </div>

<script>
// Configuration Constants
const CONFIG = {
    API_ENDPOINTS: {
        VALIDATE_ITEM: '/user/pengembalian/validation',
        STORE_RETURN: '/user/pengembalian/store'
    },
    ANIMATION_DURATION: 1000,
    SCANNER_INPUT_TIMEOUT: 100
};

// Utility Functions
const Utils = {
    getCsrfToken() {
        return document.querySelector('meta[name="csrf-token"]').content;
    },
    showAlert(message) {
        alert(message);
    },
    logError(error) {
        console.error('Error:', error);
    }
};

// Return Item Management
const ReturnItemManager = {
    scanHandler: {
        init() {
            let kodeBarangScanned = '';
            let lastScannedTimeout;

            document.addEventListener('keydown', (e) => {
                if (['Shift', 'Control', 'Alt'].includes(e.key)) return;

                if (e.key === 'Enter') {
                    if (kodeBarangScanned) {
                        this.processItemValidation(kodeBarangScanned);
                        kodeBarangScanned = '';
                        clearTimeout(lastScannedTimeout);
                    }
                } else {
                    kodeBarangScanned += e.key;
                    clearTimeout(lastScannedTimeout);
                    lastScannedTimeout = setTimeout(() => {
                        kodeBarangScanned = '';
                    }, CONFIG.SCANNER_INPUT_TIMEOUT);
                }
            });
        },
        async processItemValidation(itemCode) {
            try {
                const response = await fetch(CONFIG.API_ENDPOINTS.VALIDATE_ITEM, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': Utils.getCsrfToken()
                    },
                    body: JSON.stringify({ itemCode: itemCode })
                });

                const data = await response.json();
                if (data.success) {
                    this.highlightValidatedItem(itemCode);
                } else {
                    Utils.showAlert(data.message || 'Validasi item gagal.');
                }
            } catch (error) {
                Utils.logError(error);
                Utils.showAlert('Terjadi kesalahan saat memvalidasi item');
            }
        },
        highlightValidatedItem(itemCode) {
            const checkboxes = document.querySelectorAll('[data-code]');

            checkboxes.forEach((checkbox) => {
                if (checkbox.getAttribute('data-code') === itemCode) {
                    checkbox.checked = true;
                    const row = checkbox.closest('tr');

                    if (row) {
                        row.classList.add('bg-green-50');
                        this.flashRowAnimation(row);
                    }

                    checkbox.disabled = true;
                }
            });
        },
        flashRowAnimation(row) {
            row.classList.add('flash-animation');
            setTimeout(() => {
                row.classList.remove('flash-animation');
            }, CONFIG.ANIMATION_DURATION);
        }
    },

    returnSubmissionHandler: {
        init() {
            const savePengembalianButton = document.getElementById("savePengembalian");

            savePengembalianButton.addEventListener("click", () => {
                this.prepareAndSubmitReturnData();
            });
        },
        prepareAndSubmitReturnData() {
            const dataToSubmit = this.collectReturnData();
            this.hideSaveModal();
            this.submitReturnData(dataToSubmit);
        },
        collectReturnData() {
            const rows = document.querySelectorAll("tr");
            return Array.from(rows)
                .map(row => {
                    const uuidInput = row.querySelector(".item-uuid");
                    const codeInput = row.querySelector(".item-code");
                    const conditionDropdown = row.querySelector("#item-conditions");
                    const checkbox = row.querySelector("[type='checkbox']");

                    if (uuidInput && conditionDropdown && checkbox) {
                        return {
                            item_uuid: uuidInput.value,
                            item_code: codeInput.value,
                            condition: conditionDropdown.value,
                            isChecked: checkbox.checked
                        };
                    }
                    return null;
                })
                .filter(item => item !== null);
        },
        hideSaveModal() {
            const saveModal = document.getElementById('save-modal');
            saveModal.classList.add('hidden');
        },
        async submitReturnData(data) {
            try {
                const response = await fetch(CONFIG.API_ENDPOINTS.STORE_RETURN, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": Utils.getCsrfToken(),
                    },
                    body: JSON.stringify(data),
                });

                const result = await response.json();
                this.handleSubmissionResponse(result);
            } catch (error) {
                Utils.logError(error);
                Utils.showAlert("Terjadi kesalahan saat mengirim data.");
            }
        },
        handleSubmissionResponse(data) {
            console.log("Response:", data);
            const successModal = document.getElementById('successModal');
            successModal.classList.remove('hidden');
            successModal.classList.add('visible');

            // Optional: Uncomment to auto-redirect after submission
            this.redirectToReport();
        },
        redirectToReport() {
            window.location.href = '{{ route("user.pengembalian.report") }}';
        }
    }
};

document.addEventListener("DOMContentLoaded", () => {
    // Initialize scan handler
    ReturnItemManager.scanHandler.init();

    // Initialize return submission handler
    ReturnItemManager.returnSubmissionHandler.init();
});

</script>

@endsection
