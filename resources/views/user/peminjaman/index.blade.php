@extends('layouts.user.master')

@section('content')

{{-- date picker  --}}
<div id="date-range-picker" date-rangepicker class="flex items-center mt-4">
  <div class="relative">
    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
      <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
        fill="currentColor" viewBox="0 0 20 20">
        <path
          d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
      </svg>
    </div>
    <input id="datepicker-range-start" name="start" type="text"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
      placeholder="Pilih tanggal penggunaan">
  </div>
  <span class="mx-4 text-gray-500">Sampai</span>
  <div class="relative">
    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
      <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
        fill="currentColor" viewBox="0 0 20 20">
        <path
          d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
      </svg>
    </div>
    <input id="datepicker-range-end" name="end" type="text"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
      placeholder="Pilih tanggal">
  </div>

  <button id="dropdownRadioHelperButton" data-dropdown-toggle="dropdownRadioHelper"
    class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    type="button">Peruntukan<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
      fill="none" viewBox="0 0 10 6">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
    </svg>
  </button>

  <!-- Dropdown menu -->
  <div id="dropdownRadioHelper"
    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-60 dark:bg-gray-700 dark:divide-gray-600">
    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioHelperButton">
      <li>
        <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <div class="flex items-center h-5">
            <input id="helper-radio-4" name="helper-radio" type="radio" value=""
              class="w-4 h-4 text-blue-900 bg-gray-100 border-gray-300 focus:ring-blue-900 dark:focus:ring-blue-800 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
          </div>
          <div class="ms-2 text-sm">
            <label for="helper-radio-4" class="font-medium text-gray-900 dark:text-gray-300">
              <div>Individual</div>
              <p id="helper-radio-text-4" class="text-xs font-normal text-gray-500 dark:text-gray-300">Some helpful
                instruction goes over here.</p>
            </label>
          </div>
        </div>
      </li>
      <li>
        <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <div class="flex items-center h-5">
            <input id="helper-radio-5" name="helper-radio" type="radio" value=""
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
          </div>
          <div class="ms-2 text-sm">
            <label for="helper-radio-5" class="font-medium text-gray-900 dark:text-gray-300">
              <div>Company</div>
              <p id="helper-radio-text-5" class="text-xs font-normal text-gray-500 dark:text-gray-300">Some helpful
                instruction goes over here.</p>
            </label>
          </div>
        </div>
      </li>
      <li>
        <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <div class="flex items-center h-5">
            <input id="helper-radio-6" name="helper-radio" type="radio" value=""
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
          </div>
          <div class="ms-2 text-sm">
            <label for="helper-radio-6" class="font-medium text-gray-900 dark:text-gray-300">
              <div>Non profit</div>
              <p id="helper-radio-text-6" class="text-xs font-normal text-gray-500 dark:text-gray-300">Some helpful
                instruction goes over here.</p>
            </label>
          </div>
        </div>
      </li>
    </ul>
  </div>

</div>


{{-- ? --}}
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
          No Serie
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
            <input id="checkbox-table-search-1" type="checkbox"
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
          </div>
        </td>
        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
          <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
          <div class="ps-3">
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
          <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
        </td>
      </tr>
      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="w-4 p-4">
          <div class="flex items-center">
            <input id="checkbox-table-search-2" type="checkbox"
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
          </div>
        </td>
        <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="Jese image">
          <div class="ps-3">
            <div class="text-base font-semibold">Bonnie Green</div>
            <div class="font-normal text-gray-500">bonnie@flowbite.com</div>
          </div>
        </th>
        <td class="px-6 py-4">
          Designer
        </td>
        <td class="px-6 py-4">
          <div class="flex items-center">
            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
          </div>
        </td>
        <td class="px-6 py-4">
          <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
        </td>
      </tr>
      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="w-4 p-4">
          <div class="flex items-center">
            <input id="checkbox-table-search-2" type="checkbox"
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
          </div>
        </td>
        <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-2.jpg" alt="Jese image">
          <div class="ps-3">
            <div class="text-base font-semibold">Jese Leos</div>
            <div class="font-normal text-gray-500">jese@flowbite.com</div>
          </div>
        </th>
        <td class="px-6 py-4">
          Vue JS Developer
        </td>
        <td class="px-6 py-4">
          <div class="flex items-center">
            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
          </div>
        </td>
        <td class="px-6 py-4">
          <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
        </td>
      </tr>
      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="w-4 p-4">
          <div class="flex items-center">
            <input id="checkbox-table-search-2" type="checkbox"
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
          </div>
        </td>
        <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt="Jese image">
          <div class="ps-3">
            <div class="text-base font-semibold">Thomas Lean</div>
            <div class="font-normal text-gray-500">thomes@flowbite.com</div>
          </div>
        </th>
        <td class="px-6 py-4">
          UI/UX Engineer
        </td>
        <td class="px-6 py-4">
          <div class="flex items-center">
            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
          </div>
        </td>
        <td class="px-6 py-4">
          <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
        </td>
      </tr>
      <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="w-4 p-4">
          <div class="flex items-center">
            <input id="checkbox-table-search-3" type="checkbox"
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
          </div>
        </td>
        <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-4.jpg" alt="Jese image">
          <div class="ps-3">
            <div class="text-base font-semibold">Leslie Livingston</div>
            <div class="font-normal text-gray-500">leslie@flowbite.com</div>
          </div>
        </th>
        <td class="px-6 py-4">
          SEO Specialist
        </td>
        <td class="px-6 py-4">
          <div class="flex items-center">
            <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Offline
          </div>
        </td>
        <td class="px-6 py-4">
          <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<button type="button"
  class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kembali</button>
<button type="button"
  class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>

@endsection