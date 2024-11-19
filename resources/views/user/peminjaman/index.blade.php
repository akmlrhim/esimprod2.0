@extends('layouts.user.main')

@section('title', 'Peminjaman')

@section('content')

  <div
    class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">

    <div class="flex flex-col items-center pb-1">
      <img class="w-10 h-10 mb-3 rounded-full shadow-lg" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
        alt="Bonnie image" />
      <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Akbar Laksana</h5>
      <span class="text-sm text-gray-500 dark:text-gray-400">199004232022031007</span>
      <span class="text-sm text-gray-500 dark:text-gray-400">Teknisi Siaran</span>
      <span class="text-sm text-gray-500 dark:text-gray-400">085386612234</span>
    </div>
  </div>

  <div class="relative bg-white shadow-lg dark:bg-gray-800 sm:rounded-lg mt-5">
    <div class="grid grid-cols-1 gap-4 p-5 md:grid-cols-2 lg:grid-cols-3 items-center">
      <form class="col-span-1">

        <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <i class="fa-solid fa-file-lines text-gray-500 dark:text-gray-400"></i>
          </div>
          <input type="text" id="simple-search"
            class="w-full pl-10 p-2 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-70 dark:text-white"
            placeholder="Masukkan Surat Tugas" required>
        </div>
      </form>

      <div class="col-span-1 flex items-center space-x-4">
        <div class="flex-1">
          <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                  d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
              </svg>
            </div>
            <input id="datepicker" type="text"
              class="w-full pl-10 p-2 text-sm border-gray-300  rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
              placeholder="Tanggal peminjaman" />
          </div>
        </div>

        <span class="text-gray-500 text-sm">sampai</span>

        <!-- End Date -->
        <div class="flex-1">
          <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                  d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
              </svg>
            </div>
            <input id="datepicker-range-end" name="end" type="text"
              class="w-full pl-10 p-2 text-sm border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
              placeholder="Tanggal pengembalian" />
          </div>
        </div>
      </div>

      <!-- Country Selector -->
      <div class="col-span-1">
        <select id="countries"
          class="w-full p-2 text-sm border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
          <option value="" selected>-- Pilih Peruntukan --</option>
          <option value="US">United States</option>
          <option value="CA">Canada</option>
          <option value="FR">France</option>
          <option value="DE">Germany</option>
        </select>
      </div>
    </div>
  </div>

  <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
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
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="w-4 p-4">
            <div class="flex items-center">
              <p>1</p>
            </div>
          </td>
          <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
            <div class="ps-2">
              <div class="text-base font-semibold">Neil Sims</div>
              <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>
            </div>
          </th>
          <td class="px-6 py-4">
            React Developer
          </td>
          <td class="px-6 py-4">
            <div class="flex items-center">
              <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
            </div>
          </td>
          <td class="px-6 py-4">
            <a data-modal-target="popup-modal" data-modal-toggle="popup-modal"
              class=" text-blue-600
            dark:text-blue-500 hover:text-red-600 hover:underline">
              <i class="fa-regular fa-trash-can fa-lg ml-3"></i></a>
          </td>
        </tr>
      </tbody>
    </table>


    {{-- Modal Confirmation --}}
    <div id="popup-modal" tabindex="-1"
      class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full">
      <div class="relative p-4 w-full max-w-md">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <button type="button"
            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="popup-modal">
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
            <h3 class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this
              product?</h3>
            <div class="flex justify-center space-x-2 mt-4">
              <button data-modal-hide="popup-modal" type="button"
                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                Yes, I'm sure
              </button>
              <button data-modal-hide="popup-modal" type="button"
                class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                No, cancel
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="flex justify-center space-x-2 mt-4">
    <button type="button"
      class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kembali</button>
    <button type="button"
      class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const datepickerInput = document.getElementById('datepicker');

      // Initialize Flowbite's datepicker with minDate
      const datepicker = new Datepicker(datepickerInput, {
        minDate: new Date(), // Disable past dates
        todayHighlight: true // Highlight today's date
      });
    });
  </script>




@endsection
