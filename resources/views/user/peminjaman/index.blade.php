@extends('layouts.user.main')

@section('title', 'Peminjaman')


{{-- Now --}}
@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <div
            class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center pb-1">
                <img class="w-10 h-10 mb-3 rounded-full shadow-lg"
                     src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Bonnie image"/>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Akbar Laksana</h5>
                <span class="text-sm text-gray-500 dark:text-gray-400">199004232022031007</span>
                <span class="text-sm text-gray-500 dark:text-gray-400">Teknisi Siaran</span>
                <span class="text-sm text-gray-500 dark:text-gray-400">085386612234</span>
            </div>
        </div>
        <!-- Start coding here -->
        <div class="relative bg-white dark:bg-gray-800 sm:rounded-lg">
            <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                <div class="w-full md:w-1/2">
                    <form class="col-span-1">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fa-solid fa-file-lines text-gray-500 dark:text-gray-400"></i>
                            </div>
                            <input type="text" id="nomor-surat"
                                   class="w-full pl-10 p-2 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-70 dark:text-white"
                                   placeholder="Masukkan Surat Tugas" required>
                        </div>
                    </form>
                </div>
                <div
                    class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                    <div class="flex items-center w-full space-x-3 md:w-auto">
                        <div id="date-range-picker" class="flex items-center">
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input id="tanggal-pinjam" type="date"
                                       class="w-full pl-10 p-2 text-sm border-gray-300  rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                                       placeholder="Tanggal peminjaman"/>
                            </div>
                            <span class="mx-4 text-gray-500">Sampai</span>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input id="tanggal-kembali" name="end" type="date"
                                       class="w-full pl-10 p-2 text-sm border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                                       placeholder="Tanggal pengembalian"/>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <select id="peruntukan"
                                    class="w-full p-2 text-sm border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                                <option value="" selected>-- Pilih Peruntukan --</option>
                                @foreach($peruntukanData as $peruntukan)
                                    <option value="{{$peruntukan->id }}">{{$peruntukan->peruntukan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 bg-white dark:bg-gray-900">
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">

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
            @if(session('borrowed_items'))
                @foreach(session('borrowed_items') as $index => $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                        data-item-id="{{ $item['uuid'] }}">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <p>{{ $index + 1 }}</p>
                            </div>
                        </td>
                        <th scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
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

        {{-- Delete Modal Confirmation --}}
        <div id="popup-modal" tabindex="-1"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full">
            <div class="relative p-4 w-full max-w-md">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center flex flex-col items-center">
                        <svg class="mx-auto mb-2 text-gray-400 w-6 h-6 dark:text-gray-200" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Hapus Barang dari
                            Daftar?</h3>
                        <input type="hidden" id="modal-uuid">
                        <div class="flex justify-center space-x-2 mt-4">
                            <button data-modal-hide="popup-modal" type="button" onclick="confirmDelete()"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Ya
                            </button>
                            <button data-modal-hide="popup-modal" type="button"
                                    class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Tidak
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Save Modal Confirmation --}}
        <div id="save-modal" tabindex="-1"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full">
            <div class="relative p-4 w-full max-w-md">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="p-4 md:p-5 text-center flex flex-col items-center">
                        <svg class="mx-auto mb-2 text-gray-400 w-6 h-6 dark:text-gray-200" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Simpan Peminjaman
                            Ini?</h3>
                        <div class="flex justify-center space-x-2 mt-4">
                            <button id="saveButton" data-modal-hide="popup-modal" type="button"
                                    class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Simpan
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

        {{-- Create Borrow Success Modal --}}
        <div id="successModal" tabindex="-1" aria-hidden="true"
             class="hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-screen bg-black bg-opacity-50">
            <div class="relative p-4 w-full max-w-md bg-white rounded-lg shadow-md dark:bg-gray-800">
                {{-- Modal content --}}
                <div class="text-center">
                    <div
                        class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 p-2 flex items-center justify-center mx-auto mb-3.5">
                        <svg aria-hidden="true" class="w-8 h-8 text-green-500 dark:text-green-400" fill="currentColor"
                             viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Success</span>
                    </div>
                    <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Peminjaman Berhasil Di Buat</p>
                    <button id="successButton" type="button"
                            class="py-2 px-3 text-sm font-medium text-white bg-blue-900 hover:bg-blue-700 rounded-lg focus:ring-4 focus:outline-none dark:focus:ring-primary-900">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- button --}}
    <div class="flex justify-center space-x-2 mt-4">
        <a href="/options">
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
    {{-- Toast Success --}}
    <div id="toast-success-add"
         class="hidden items-center fixed bottom-9 right-5 w-full max-w-xs p-4 mb-4 border border-gray-400 text-gray-600 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
         role="alert">
        <div
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                 viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ms-3 text-sm font-normal"></div>
    </div>

    <!-- Toast Redundant Item -->
    <div id="toast-warning"
         class="hidden items-center fixed bottom-9 right-5 w-full max-w-xs p-4 mb-4 border border-gray-400 text-gray-600 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
         role="alert">
        <div
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                 viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
            </svg>
            <span class="sr-only">Warning icon</span>
        </div>
        <div class="ms-3 text-sm font-normal"></div>
    </div>

    {{--    <!-- Toast -->--}}
    <div id="toast-danger-2"
         class="hidden items-center fixed top-14 right-5 w-full max-w-xs p-4 mb-4 border border-gray-400 text-gray-600 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
         role="alert">
        <div
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-700 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
            <svg class="w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                 viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
            </svg>
            <span class="sr-only">Error icon</span>
        </div>
        <div class="ms-3 text-normal font-normal">?</div>
        <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-500 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-danger-2" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modalTriggers = document.querySelectorAll('[data-modal-toggle="popup-modal"]');
            modalTriggers.forEach(trigger => {
                trigger.addEventListener('click', function () {
                    const uuid = this.getAttribute('data-uuid');
                    document.getElementById('modal-uuid').value = uuid;
                });
            });
        });

        function confirmDelete() {
            const uuid = document.getElementById('modal-uuid').value;
            removeItem(uuid); // Panggil fungsi delete dengan UUID
        }

        document.addEventListener('DOMContentLoaded', function () {
            const datepickerInput = document.getElementById('datepicker');
            // Initialize Flowbite's datepicker with minDate
            const datepicker = new Datepicker(datepickerInput, {
                minDate: new Date(), // Disable past dates
                todayHighlight: true // Highlight today's date
            });
        });

        // Scanner Input Program
        document.addEventListener('DOMContentLoaded', function () {
            let lastScanned = '';
            let lastScannedTimeout;

            document.addEventListener('keydown', function (e) {
                if (['Shift', 'Control', 'Alt'].includes(e.key)) return;

                if (e.key === 'Enter') {
                    if (lastScanned) {
                        processBarcodeInput(lastScanned);
                        lastScanned = '';
                        clearTimeout(lastScannedTimeout);
                    }
                } else {
                    lastScanned += e.key;
                    clearTimeout(lastScannedTimeout);
                    lastScannedTimeout = setTimeout(() => {
                        lastScanned = '';
                    }, 100);
                }
            });

            function processBarcodeInput(qrcode) {
                fetch('http://127.0.0.1:8000/user/peminjaman/scan', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({qrcode})
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            addItemToTable(data.item);
                            document.querySelector("#toast-success-add .text-sm").textContent = data.message; // Set success message
                            document.getElementById("toast-success-add").style.display = "flex"; // Show success toast
                            // console.log(data.message);
                            setTimeout(() => {
                                document.getElementById("toast-success").style.display = "none";
                            }, 1000);
                        } else {
                            document.querySelector("#toast-warning .text-sm").textContent = data.message; // Set failure message
                            document.getElementById("toast-warning").style.display = "flex"; // Show warning toast
                            // console.log(data.message);
                            setTimeout(() => {
                                document.getElementById("toast-warning").style.display = "none";
                            }, 1000);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }

            // Menambahkan data yang di scan ke tabel & update penomoran
            function addItemToTable(item) {
                const tbody = document.querySelector('table tbody');
                const rowCount = tbody.children.length + 1;
                const tr = document.createElement('tr');
                tr.className = 'bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600';
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
            <td class="px-6 py-4">
                ${item.merk}
            </td>
            <td class="px-6 py-4">
                <div class="flex items-center">
                    ${item.serial_number}
                </div>
            </td>
            <td class="px-6 py-4">
                <a href="#" onclick="removeItem('${item.uuid}')" class="text-blue-600 dark:text-blue-500 hover:text-red-600 hover:underline">
                    <i class="fa-regular fa-trash-can fa-lg ml-3"></i>
                </a>
            </td>
        `;

                tbody.appendChild(tr);
            }
        });

        // Remove data barang ditabel scan
        function removeItem(uuid) {
            fetch(`/user/peminjaman/remove/${uuid}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const tbody = document.querySelector('table tbody');
                        const row = tbody.querySelector(`tr[data-item-id="${uuid}"]`);
                        if (row) {
                            tbody.removeChild(row); // Hapus baris dari tabel
                            updateRowNumbers(); // Perbarui nomor urut
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        // Store data peminjaman
        async function savePeminjaman() {
            // Ambil nilai dari input form
            const suratTugas = document.getElementById('nomor-surat').value;
            const tanggalPeminjaman = document.getElementById('tanggal-pinjam').value;
            const tanggalPengembalian = document.getElementById('tanggal-kembali').value;
            const peruntukanId = document.getElementById('peruntukan').value;

            // Validasi input
            if (!suratTugas || !tanggalPeminjaman || !tanggalPengembalian || !peruntukanId) {

                document.querySelector("#toast-danger-2 .text-sm").textContent = data.message; // Set success message
                document.getElementById("toast-danger-2").style.display = "flex"; // Show success toast
                // console.log(data.message);
                setTimeout(() => {
                    document.getElementById("toast-danger-2").style.display = "none";
                }, 1500);
                return;
            }
            try {
                // Dapatkan CSRF token dari meta tag
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Buat payload
                const data = {
                    nomor_surat: suratTugas,
                    peruntukan_id: peruntukanId,
                    tanggal_peminjaman: tanggalPeminjaman,
                    tanggal_kembali: tanggalPengembalian,
                };

                // Kirim data ke REST API
                const response = await fetch('/user/peminjaman/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data),
                });

                const result = await response.json();
                if (result.success) {
                    const successModal = document.getElementById('successModal');
                    successModal.classList.remove('hidden'); // Hapus kelas 'hidden' untuk menampilkan modal

                    // Tombol "Selesai" dalam modal
                    const selesaiButton = document.getElementById('successButton');
                    selesaiButton.addEventListener('click', () => {
                        window.location.href = '{{ route("user.peminjaman.laporan") }}'; // Redirect ke halaman laporan
                    });
                } else {
                    document.querySelector("#toast-danger-2 .text-sm").textContent = data.message; // Set failure message
                    document.getElementById("toast-danger-2").style.display = "flex"; // Show warning toast
                    setTimeout(() => {
                        document.getElementById("toast-danger-2").style.display = "none";
                    }, 1500);
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }

        function formatDate(date) {
            return date.toISOString().split('T')[0];
        }

        document.getElementById('saveButton').addEventListener('click', function (e) {
            e.preventDefault(); // Mencegah form submit default
            savePeminjaman();
        });
        ocument.getElementById('tanggal-pinjam').addEventListener('change', function () {
            const tanggalKembali = document.getElementById('tanggal-kembali');
            tanggalKembali.min = this.value; // Set minimum tanggal kembali
        });

        // Initialize date inputs dengan tanggal minimal hari ini
        document.addEventListener('DOMContentLoaded', function () {
            const today = formatDate(new Date());
            const tanggalPinjam = document.getElementById('tanggal-pinjam');
            const tanggalKembali = document.getElementById('tanggal-kembali');

            tanggalPinjam.min = today;
            tanggalPinjam.value = today;
            tanggalKembali.min = today;
        });
    </script>
@endsection
