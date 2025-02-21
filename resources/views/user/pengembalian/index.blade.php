@extends('layouts.user.main')

@section('title', 'ESIMPROD | PENGEMBALIAN')

@section('content')

  {{-- profil --}}
  <x-peminjam-profile></x-peminjam-profile>

  <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg mt-3">
    <div class="p-4">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <div class="w-full">
          <div class="relative flex items-center">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <i class="fa-solid fa-file-lines text-gray-500"></i>
            </div>
            <input type="text"
              class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
              placeholder="{{ $peminjaman->nomor_surat }}" disabled>
          </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-2">
          <small class="flex items-center text-gray-500">Dari</small>

          <div class="flex-1">
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
              </div>
              <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                placeholder="{{ \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->format('d F Y') }}" disabled>
            </div>
          </div>

          <small class="flex items-center text-gray-500">sampai</small>

          <div class="flex-1">
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
              </div>
              <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                placeholder="{{ \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d F Y') }}" disabled>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-4 flex justify-start">
        <small class="flex items-center text-gray-500 mr-3">Peruntukan</small>
        <input type="text"
          class="bg-gray-50 border border-gray-400 text-center text-gray-500 text-sm rounded-lg p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400"
          value="{{ $peminjaman->peruntukan->peruntukan }}" disabled>
      </div>
    </div>

    <div class="max-h-72 overflow-y-auto">
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
          @foreach ($barang as $key => $item)
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
                  {{ $item['nomor_seri'] }}
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
                <input type="hidden" name="kodeBarang" value="{{ $item['kode_barang'] }}" class="item-code"
                  id="item-code">
                <input id="bordered-checkbox-2" type="checkbox" value="" name="bordered-checkbox"
                  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                  data-code="{{ $item['kode_barang'] }}" disabled>
                <label for="bordered-checkbox-2"
                  class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  {{-- button  --}}
  <div class="flex justify-center space-x-2 mt-4 mb-16">
    <a href="{{ route('user.option') }}" type="button"
      class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kembali</a>
    <button type="button" data-modal-target="save-modal" data-modal-toggle="save-modal"
      class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
  </div>

  <x-pengembalian-popup></x-pengembalian-popup>

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
              body: JSON.stringify({
                itemCode: itemCode
              })
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
          window.location.href = '{{ route('user.pengembalian.report') }}';
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
