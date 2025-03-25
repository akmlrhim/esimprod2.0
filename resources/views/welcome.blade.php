@extends('layouts.main')

@section('content')
  {{-- content  --}}
  <div class="p-4 sm:ml-64">
    <div class="p-4 mt-12">
      {{-- breadcrumb  --}}
      <nav
        class="flex px-3 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
          <li class="inline-flex items-center">
            <a href="#"
              class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
              <i class="fa-solid fa-house mr-3"></i> Home
            </a>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <i class="fa-solid fa-chevron-right"></i>
              <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Flowbite</span>
            </div>
          </li>
        </ol>
      </nav>
    </div>


    {{-- main-content  --}}
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 p-4">
      <div class="bg-blue-300 border border-gray-200 rounded-lg shadow p-4 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center space-x-2">
          <i class="fa-solid fa-box text-gray-900 dark:text-white"></i>
          <h3 class="text-lg font-medium text-gray-900 dark:text-white">101</h3>
        </div>
        <p class="text-sm text-black-600 ">User</p>
      </div>
      <div class="bg-red-300 border border-gray-200 rounded-lg shadow p-4 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center space-x-2">
          <i class="fa-solid fa-box text-gray-900 dark:text-white"></i>
          <h3 class="text-lg font-medium text-gray-900 dark:text-white">Item 01</h3>
        </div>
        <p class="text-sm text-black-600 ">Deskripsi item 01</p>
      </div>
      <div class="bg-green-200 border border-gray-200 rounded-lg shadow p-4 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center space-x-2">
          <i class="fa-solid fa-box text-gray-900 dark:text-white"></i>
          <h3 class="text-lg font-medium text-gray-900 dark:text-white">Item 01</h3>
        </div>
        <p class="text-sm text-black-600 ">Deskripsi item 01</p>
      </div>

    </div>

  </div>
@endsection
