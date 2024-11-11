@extends('layouts.user.main')

@section('title', 'Pengembalian')

@section('content')

  {{-- datpicker --}}

  <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">

    <!-- <div class="relative max-w-sm">
      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
          fill="currentColor" viewBox="0 0 20 20">
          <path
            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
        </svg>
      </div>
      <input id="datepicker-format" datepicker type="text"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Select date">
    </div> -->


    <div
      id="date-range-picker"
      date-rangepicker
      class="flex items-center"
    >
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
          id="datepicker-format"
          datepicker-buttons
          datepicker-autoselect-today
          datepicker
          type="text"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Pilih tanggal"
        >
      </div>
      <span class="mx-4 text-gray-500">Sampai</span>
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
          id="datepicker-range-end"
          name="end"
          type="text"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Pilih tanggal"
        >
      </div>
    </div>

    <kbd
      class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500"
    >Esc</kbd>

    <button
      type="button"
      class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
    >Dark</button>

    <!-- <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Get the input element
        const datepickerInput = document.getElementById('datepicker-format');

        // Get today's date in MM/DD/YYYY format
        const today = new Date();
        const minDate = today.toLocaleDateString('en-US');

        // Set the max date to one year ahead (for example)
        const maxDate = new Date(today);
        maxDate.setFullYear(today.getFullYear() + 1);
        const maxDateStr = maxDate.toLocaleDateString('en-US');

        // Set the min and max dates dynamically
        datepickerInput.setAttribute('datepicker-min-date', minDate);
        datepickerInput.setAttribute('datepicker-max-date', maxDateStr);
      });
    </script> -->


    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Get the input element
        const datepickerInput = document.getElementById('datepicker-format');

        // Get today's date in MM/DD/YYYY format
        const today = new Date();
        const minDate = today.toLocaleDateString('en-US');

        // Set the max date to today's date
        const maxDate = today.toLocaleDateString('en-US');

        // Set the min and max dates dynamically
        datepickerInput.setAttribute('datepicker-min-date', minDate);
        datepickerInput.setAttribute('datepicker-max-date', maxDate);

        // Initialize the Flowbite datepicker (if necessary)
        new Datepicker(datepickerInput, {
          // The maxDate will prevent the user from selecting dates after today
          maxDate: maxDate, // Disables future dates (i.e., dates after today)
        });
      });
    </script>
  </div>

@endsection
