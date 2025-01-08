@extends('layouts.user.main')

@section('title', 'Peminjaman')

@section('content')
  <div class="overflow-x-auto shadow-md sm:rounded-lg mt-2">

    {{-- profil  --}}
    <div class="w-full p-4 text-center bg-white rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
      <div class="flex flex-col items-center pb-1">
        <img
          class="w-20 h-20 mb-3 rounded-full shadow-lg"
          src="{{ asset('storage/uploads/foto_user/' . Auth::user()->foto) }}"
          alt="Foto Profil"
          title="{{ Auth::user()->nama_lengkap }}"
        />
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ Auth::user()->nama_lengkap }}</h5>
        <span class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->nip }}</span>
        <span class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->jabatan->jabatan }}</span>
        <span class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->nomor_hp }}</span>
      </div>
    </div>

    {{-- input data  --}}
    <div class="relative overflow-auto bg-white dark:bg-gray-800 sm:rounded-lg">
      <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
        <div class="w-full md:w-1/2">
          <form
            class="col-span-1"
            id="form"
          >
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fa-solid fa-file-lines text-gray-500 dark:text-gray-400"></i>
              </div>
              <input
                type="text"
                id="nomor-surat"
                name="nomor_surat"
                class="w-full pl-10 p-2 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-70 dark:text-white"
                placeholder="Masukkan Surat Tugas"
              >
              @error('nomor_surat')
                <small class="text-red-500 text-sm"> {{ $message }}</small>
              @enderror
            </div>
          </form>
        </div>
        <div
          class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3"
        >
          <div class="flex items-center w-full space-x-3 md:w-auto">
            <div
              id="date-range-picker"
              class="flex items-center"
            >
              <small class="mx-4 text-gray-500">Dari</small>
              <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg
                    class="w-4 h-4 text-gray-500 dark:text-gray-400"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                    />
                  </svg>
                </div>
                <input
                  id="tanggal-penggunaan"
                  type="date"
                  readonly
                  disabled
                  class="w-full pl-10 p-2 text-sm border-gray-300  rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                  placeholder="Tanggal peminjaman"
                />
              </div>
              <small class="mx-4 text-gray-500">Sampai</small>
              <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg
                    class="w-4 h-4 text-gray-500 dark:text-gray-400"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                    />
                  </svg>
                </div>
                <input
                  id="tanggal-kembali"
                  name="end"
                  type="date"
                  class="w-full pl-10 p-2 text-sm border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                  placeholder="Tanggal pengembalian"
                  onclick="this.showPicker();"
                />
              </div>
            </div>

            {{-- peruntukan --}}
            <div>
              <select
                id="peruntukan"
                name="peruntukan"
                class="w-full p-2 text-sm border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                onchange="toggleLainnyaInput(this.value)"
              >
                <option
                  value=""
                  selected
                >-- Pilih Peruntukan --</option>
                @foreach ($peruntukanData as $peruntukan)
                  <option value="{{ $peruntukan->id }}">{{ $peruntukan->peruntukan }}</option>
                @endforeach
                <option value="lainnya">Lainnya</option>
              </select>
            </div>

            {{-- form input jika user memilih lainnya (tidak ada di database) --}}
            <div
              id="lainnya-input"
              class="col-span-1 hidden"
            >
              <input
                type="text"
                name="peruntukan_lainnya"
                id="peruntukan_lainnya"
                class="w-full p-2 text-sm border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                placeholder="Masukkan peruntukan lainnya"
              >
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
            <th
              scope="col"
              class="p-4"
            >
              No
            </th>
            <th
              scope="col"
              class="px-6 py-3"
            >
              Nama Barang
            </th>
            <th
              scope="col"
              class="px-6 py-3"
            >
              Merk
            </th>
            <th
              scope="col"
              class="px-6 py-3"
            >
              No Seri
            </th>
            <th
              scope="col"
              class="px-6 py-3"
            >
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          @if (session('borrowed_items'))
            @foreach (session('borrowed_items') as $index => $item)
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                data-item-id="{{ $item['uuid'] }}"
                id="item-{{ $item['uuid'] }}"
              >
                <td class="w-4 p-4">
                  <div class="flex items-center">
                    <p>{{ $index + 1 }}</p>
                  </div>
                </td>
                <th
                  scope="row"
                  class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white"
                >
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
                  <a
                    href="#"
                    data-modal-target="popup-modal"
                    data-modal-toggle="popup-modal"
                    data-uuid="{{ $item['uuid'] }}"
                    class="text-blue-600 dark:text-blue-500 hover:text-red-600 hover:underline"
                  >
                    <i class="fa-regular fa-trash-can fa-lg ml-3"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>


    {{-- Delete Modal Confirmation --}}
    <div
      id="popup-modal"
      tabindex="-1"
      class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full"
    >
      <div class="relative p-4 w-full max-w-md">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <button
            type="button"
            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="popup-modal"
          >
            <svg
              class="w-3 h-3"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 14 14"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
              />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
          <div class="p-4 md:p-5 text-center flex flex-col items-center">
            <svg
              class="mx-auto mb-2 text-gray-400 w-6 h-6 dark:text-gray-200"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 20 20"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
              />
            </svg>
            <h3 class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Hapus Barang dari
              Daftar?</h3>
            <input
              type="hidden"
              id="modal-uuid"
            >
            <div class="flex justify-center space-x-2 mt-4">
              <button
                data-modal-hide="popup-modal"
                type="button"
                onclick="ModalHandler.confirmDelete()"
                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
              >
                Ya
              </button>
              <button
                data-modal-hide="popup-modal"
                type="button"
                class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
              >
                Tidak
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Save Modal Confirmation --}}
    <div
      id="save-modal"
      tabindex="-1"
      class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full"
    >
      <div class="relative p-4 w-full max-w-md">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <div class="p-4 md:p-5 text-center flex flex-col items-center">
            <svg
              class="mx-auto mb-2 text-gray-400 w-6 h-6 dark:text-gray-200"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 20 20"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
              />
            </svg>
            <h3 class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Simpan Peminjaman
              Ini?</h3>
            <div class="flex justify-center space-x-2 mt-4">
              <button
                id="saveButton"
                data-modal-hide="popup-modal"
                type="button"
                class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
              >
                Simpan
              </button>
              <button
                data-modal-hide="save-modal"
                type="button"
                class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
              >
                Tidak
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Create Borrow Success Modal --}}
    <div
      id="successModal"
      tabindex="-1"
      aria-hidden="true"
      class="hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-screen bg-black bg-opacity-50"
    >
      <div class="relative p-4 w-full max-w-md bg-white rounded-lg shadow-md dark:bg-gray-800">
        {{-- Modal content --}}
        <div class="text-center">
          <div
            class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 p-2 flex items-center justify-center mx-auto mb-3.5"
          >
            <svg
              aria-hidden="true"
              class="w-8 h-8 text-green-500 dark:text-green-400"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                clip-rule="evenodd"
              ></path>
            </svg>
            <span class="sr-only">Success</span>
          </div>
          <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Peminjaman Berhasil Di Buat</p>
          <button
            id="successButton"
            type="button"
            class="py-2 px-3 text-sm font-medium text-white bg-blue-900 hover:bg-blue-700 rounded-lg focus:ring-4 focus:outline-none dark:focus:ring-primary-900"
          >
            OK
          </button>
        </div>
      </div>
    </div>
  </div>

  {{-- button --}}
  <div class="flex justify-center space-x-2 mt-4 mb-16">
    <a href="{{ route('user.option') }}">
      <button
        type="button"
        class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
      >
        Kembali
      </button>
    </a>
    <button
      data-modal-target="save-modal"
      data-modal-toggle="save-modal"
      type="button"
      class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
    >
      Simpan
    </button>
  </div>


  {{-- Toast Success --}}
  <div
    id="toast-success-add"
    class="hidden items-center fixed bottom-9 right-5 w-full max-w-xs p-4 mb-4 border border-gray-400 text-gray-600 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
    role="alert"
  >
    <div
      class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200"
    >
      <svg
        class="w-5 h-5"
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 20 20"
      >
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
        />
      </svg>
      <span class="sr-only">Check icon</span>
    </div>
    <div class="ms-3 text-sm font-normal"></div>
  </div>


  <!-- Toast Redundant Item -->
  <div
    id="toast-warning"
    class="hidden items-center fixed bottom-9 right-5 w-full max-w-xs p-4 mb-4 border border-gray-400 text-gray-600 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
    role="alert"
  >
    <div
      class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200"
    >
      <svg
        class="w-5 h-5"
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 20 20"
      >
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"
        />
      </svg>
      <span class="sr-only">Warning icon</span>
    </div>
    <div class="ms-3 text-sm font-normal"></div>
  </div>

  {{--    <!-- Toast --> --}}
  <div
    id="toast-danger-2"
    class="hidden items-center fixed top-14 right-5 w-full max-w-xs p-4 mb-4 border border-gray-400 text-gray-600 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
    role="alert"
  >
    <div
      class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-700 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200"
    >
      <svg
        class="w-7 h-7"
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 20 20"
      >
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"
        />
      </svg>
      <span class="sr-only">Error icon</span>
    </div>

    <div class="ms-3 text-normal font-normal">?</div>
    <button
      type="button"
      class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-500 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
      data-dismiss-target="#toast-danger-2"
      aria-label="Close"
    >
      <span class="sr-only">Close</span>
      <svg
        class="w-3 h-3"
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 14 14"
      >
        <path
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
        />
      </svg>
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

<<<<<<< HEAD
=======
    // form lainnya untuk select peruntukan
    function toggleLainnyaInput(value) {
      const lainnyaInput = document.getElementById('lainnya-input');
      if (value === 'lainnya') {
        lainnyaInput.classList.remove('hidden');
      } else {
        lainnyaInput.classList.add('hidden');
      }
    }

>>>>>>> 0d8173f (ags)
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
