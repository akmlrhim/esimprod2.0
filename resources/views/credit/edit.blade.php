@extends('layouts.admin.main')

@section('content')
  <div class="flex flex-col p-3 ml-3 mr-3">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="border rounded overflow-hidden dark:border-neutral-700">
          <form action="{{ route('credit.update', $credit->uuid) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-2 ml-3 mt-5 mr-7 text-end">
              <a href="/credit"
                class="inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-white hover:bg-gray-700 focus:ring focus:ring-gray-500 mr-2">
                <i class="fa-solid fa-arrow-left mr-3"></i> Kembali
              </a>
              <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-blue-400 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:ring focus:ring-blue-500">
                <i class="fa-solid fa-floppy-disk mr-3"></i> Simpan
              </button>
            </div>


            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
              <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                <tr>
                  <th scope="row"
                    class="px-6 py-3 text-start text-medium font-medium text-black uppercase dark:text-neutral-500">
                    Name
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                    <input type="text" id="name" name="name"
                      class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      value="Disabled input" disabled value="Jim Green">
                  </td>
                </tr>
                <tr>
                  <th scope="row"
                    class="px-6 py-3 text-start text-medium font-medium text-black uppercase dark:text-neutral-500">Age
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                    <input type="number" id="age" name="age"
                      class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500""
                      value="27" disabled readonly>
                  </td>
                </tr>
                <tr>
                  <th scope="row"
                    class="px-6 py-3 text-start text-medium font-medium text-black uppercase dark:text-neutral-500">
                    Address
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                    <input type="text" id="address" name="address"
                      class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      value="London No. 1 Lake Park">
                  </td>
                </tr>
                <tr>
                  <th scope="row"
                    class="px-6 py-3 text-start text-medium font-medium text-black uppercase dark:text-neutral-500">
                    Upload File
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                    <input type="file" id="file" name="file" disabled readonly
                      class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
