@extends('layouts.user.main')

@section('title', 'Peminjaman')

@section('content')
  <div class="overflow-x-auto shadow-md sm:rounded-lg mt-2">

    {{-- profil  --}}
    <x-peminjam-profile></x-peminjam-profile>


    {{-- input data  --}}
    <div class="relative overflow-auto bg-white dark:bg-gray-800 sm:rounded-lg">
      <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
        <div class="w-full md:w-1/2">
          <form class="col-span-1" id="form">
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fa-solid fa-file-lines text-gray-500 dark:text-gray-400"></i>
              </div>
              <input type="text" id="nomor-surat" name="nomor_surat"
                class="w-full pl-10 p-2 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-70 dark:text-white"
                placeholder="Masukkan Surat Tugas">
              @error('nomor_surat')
                <small class="text-red-500 text-sm"> {{ $message }}</small>
              @enderror
            </div>
          </form>
        </div>
        <div
          class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
          <div class="flex items-center w-full space-x-3 md:w-auto">
            <div id="date-range-picker" class="flex items-center">
              <small class="mx-4 text-gray-500">Dari</small>
              <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                  </svg>
                </div>
                <input id="tanggal-penggunaan" type="date" readonly disabled
                  class="w-full pl-10 p-2 text-sm border-gray-300  rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                  placeholder="Tanggal peminjaman" />
              </div>
              <small class="mx-4 text-gray-500">Sampai</small>
              <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                  </svg>
                </div>
                <input id="tanggal-kembali" name="end" type="date"
                  class="w-full pl-10 p-2 text-sm border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                  placeholder="Tanggal pengembalian" onclick="this.showPicker();" />
              </div>
            </div>

            {{-- peruntukan --}}
            <div>
              <select id="peruntukan" name="peruntukan"
                class="w-full p-2 text-sm border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                <option value="" selected>-- Pilih Peruntukan --</option>
                @foreach ($peruntukanData as $peruntukan)
                  <option value="{{ $peruntukan->id }}">{{ $peruntukan->peruntukan }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- list barang peminjaman --}}
    <div class="max-h-72 overflow-y-auto">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
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
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          @if (session('borrowed_items'))
            @foreach (session('borrowed_items') as $index => $item)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                data-item-id="{{ $item['uuid'] }}" id="item-{{ $item['uuid'] }}">
                <td class="w-4 p-4">
                  <div class="flex items-center">
                    <p>{{ $index + 1 }}</p>
                  </div>
                </td>
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                  <div class="ps-2">
                    <div class="text-base font-semibold">{{ $item['name'] }}</div>
                  </div>
                </th>
                <td class="px-6 py-4">
                  {{ $item['merk'] }}
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center">
                    {{ $item['serial_number'] }}
                  </div>
                </td>
                <td class="px-6 py-4">
                  <a href="#" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                    data-uuid="{{ $item['uuid'] }}"
                    class="text-blue-600 dark:text-blue-500 hover:text-red-600 hover:underline">
                    <i class="fa-regular fa-trash-can fa-lg ml-3"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>

    <x-peminjaman-popup></x-peminjaman-popup>

  </div>

  {{-- button --}}
  <div class="flex justify-center space-x-2 mt-4 mb-16">
    <a href="{{ route('user.option') }}">
      <button type="button"
        class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Kembali
      </button>
    </a>
    <button data-modal-target="save-modal" data-modal-toggle="save-modal" type="button"
      class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
      Simpan
    </button>
  </div>

  <script>
    // Constants and Configuration
    const CONFIG = {
      API_ENDPOINTS: {
        SCAN_ITEM: 'http://127.0.0.1:8000/user/peminjaman/scan',
        REMOVE_ITEM: '/user/peminjaman/remove/',
        STORE_LOAN: '/user/peminjaman/store'
      },
      TIMEOUT_DURATION: 1500,
      SCANNER_INPUT_TIMEOUT: 100
    };


    // Utility Functions
    const Utils = {
      getCsrfToken() {
        return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      },
      formatDate(date) {
        return date.toISOString().split('T')[0];
      },
      showToast(toastId, message) {
        const toast = document.getElementById(toastId);
        toast.querySelector('.text-sm').textContent = message;
        toast.style.display = 'flex';

        setTimeout(() => {
          toast.style.display = 'none';
        }, CONFIG.TIMEOUT_DURATION);
      }
    };

    // Modal Handling
    const ModalHandler = {
      init() {
        const modalTriggers = document.querySelectorAll('[data-modal-toggle="popup-modal"]');
        modalTriggers.forEach(trigger => {
          trigger.addEventListener('click', () => {
            const uuid = trigger.getAttribute('data-uuid');
            document.getElementById('modal-uuid').value = uuid;
          });
        });
      },
      confirmDelete() {
        const uuid = document.getElementById('modal-uuid').value;
        ItemManager.removeItem(uuid);
      }
    };

    // Item Management
    const ItemManager = {
      addItemToTable(item) {
        const tbody = document.querySelector('table tbody');
        const rowCount = tbody.children.length + 1;
        const tr = document.createElement('tr');

        tr.className =
          'bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600';
        tr.dataset.itemId = item.uuid;
        tr.innerHTML = `
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <p>${rowCount}</p>
                        </div>
                    </td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="ps-2">
                            <div class="text-base font-semibold">${item.name}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">${item.merk}</td>
                    <td class="px-6 py-4">${item.serial_number}</td>
                    <td class="px-6 py-4">
                        <a href="#" onclick="ItemManager.removeItem('${item.uuid}')" class="text-blue-600 dark:text-blue-500 hover:text-red-600 hover:underline">
                            <i class="fa-regular fa-trash-can fa-lg ml-3"></i>
                        </a>
                    </td>
                `;

        tbody.appendChild(tr);
        this.updateRowNumbers();
      },

      removeItem(uuid) {
        fetch(`${CONFIG.API_ENDPOINTS.REMOVE_ITEM}${uuid}`, {
            method: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': Utils.getCsrfToken()
            }
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              const tbody = document.querySelector('table tbody');
              const row = tbody.querySelector(`tr[data-item-id="${uuid}"]`);
              if (row) {
                tbody.removeChild(row);
                this.updateRowNumbers();
              }
            }
          })
          .catch(console.error);
      },
      updateRowNumbers() {
        const tbody = document.querySelector('table tbody');
        Array.from(tbody.children).forEach((row, index) => {
          row.querySelector('td p').textContent = index + 1;
        });
      }
    };

    // Scanner Handler
    const ScannerHandler = {
      init() {
        let lastScanned = '';
        let lastScannedTimeout;

        document.addEventListener('keydown', (e) => {
          if (['Shift', 'Control', 'Alt'].includes(e.key)) return;

          if (e.key === 'Enter') {
            if (lastScanned) {
              this.processBarcodeInput(lastScanned);
              lastScanned = '';
              clearTimeout(lastScannedTimeout);
            }
          } else {
            lastScanned += e.key;
            clearTimeout(lastScannedTimeout);
            lastScannedTimeout = setTimeout(() => {
              lastScanned = '';
            }, CONFIG.SCANNER_INPUT_TIMEOUT);
          }
        });
      },
      processBarcodeInput(qrcode) {
        fetch(CONFIG.API_ENDPOINTS.SCAN_ITEM, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': Utils.getCsrfToken()
            },
            body: JSON.stringify({
              qrcode
            })
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              ItemManager.addItemToTable(data.item);
              Utils.showToast('toast-success-add', data.message);
            } else {
              Utils.showToast('toast-warning', data.message);
            }
          })
          .catch(console.error);
      }
    };

    // Loan Management
    const LoanManager = {
      async savePeminjaman() {
        const inputs = {
          suratTugas: document.getElementById('nomor-surat').value,
          tanggalPenggunaan: document.getElementById('tanggal-penggunaan').value,
          tanggalPengembalian: document.getElementById('tanggal-kembali').value,
          peruntukanId: document.getElementById('peruntukan').value
        };
        console.log(inputs);
        // Validate inputs
        if (Object.values(inputs).some(value => !value)) {
          Utils.showToast('toast-danger-2', 'Please fill all required fields');
          return;
        }

        try {
          const response = await fetch(CONFIG.API_ENDPOINTS.STORE_LOAN, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': Utils.getCsrfToken(),
              'Accept': 'application/json'
            },
            body: JSON.stringify({
              nomor_surat: inputs.suratTugas,
              peruntukan_id: inputs.peruntukanId,
              tanggal_penggunaan: inputs.tanggalPenggunaan,
              tanggal_kembali: inputs.tanggalPengembalian
            })
          });

          const result = await response.json();
          if (result.success) {
            this.showSuccessModal();
          } else {
            Utils.showToast('toast-danger-2', result.message);
          }
        } catch (error) {
          console.error('Error:', error);
        }
      },
      showSuccessModal() {
        const successModal = document.getElementById('successModal');
        successModal.classList.remove('hidden');

        const selesaiButton = document.getElementById('successButton');
        selesaiButton.addEventListener('click', () => {
          window.location.href = '/user/peminjaman/report';
        });
      },
      initDateInputs() {
        const today = Utils.formatDate(new Date());
        const tanggalPinjam = document.getElementById('tanggal-penggunaan');
        const tanggalKembali = document.getElementById('tanggal-kembali');

        tanggalPinjam.min = today;
        tanggalPinjam.value = today;
        tanggalKembali.min = today;

        // Add event listener for date change
        tanggalPinjam.addEventListener('change', function() {
          tanggalKembali.min = this.value;
        });
      }
    };

    // Initialize on DOM Load
    document.addEventListener('DOMContentLoaded', () => {
      ModalHandler.init();
      ScannerHandler.init();
      LoanManager.initDateInputs();

      // Bind save button
      document.getElementById('saveButton').addEventListener('click', (e) => {
        e.preventDefault();
        LoanManager.savePeminjaman();
      });

      // Optional: Datepicker initialization if Flowbite is used
      const datepickerInput = document.getElementById('datepicker');
      if (datepickerInput) {
        new Datepicker(datepickerInput, {
          minDate: new Date(),
          todayHighlight: true
        });
      }
    });

    document.getElementById('peruntukan').addEventListener('change', function() {
      this.blur();
    });

    document.addEventListener('DOMContentLoaded', function() {
      const newItem = document.querySelector('[data-item-id]');
      if (newItem) {
        newItem.scrollIntoView({
          behavior: 'smooth',
          block: 'center'
        });
      }
    });
  </script>
@endsection
