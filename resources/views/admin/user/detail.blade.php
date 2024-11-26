@extends('layouts.admin.main')
@section('content')
  <div class="flex p-3 ml-3 mr-3">
    <a href="{{ route('users.index') }}"
      class="mr-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
      type="button">
      Kembali
    </a>
  </div>


  {{-- detail content --}}
  <div class="p-3 ml-6 mr-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <ul
      class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
      id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
      <li class="me-2">
        <button id="detail-tab" data-tabs-target="#detail" type="button" role="tab" aria-controls="detail"
          aria-selected="true"
          class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Detail</button>
      </li>
      <li class="me-2">
        <button id="gambar-tab" data-tabs-target="#gambar" type="button" role="tab" aria-controls="gambar"
          aria-selected="false"
          class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Foto</button>
      </li>
      <li class="me-2">
        <button id="qrcode-tab" data-tabs-target="#qrcode" type="button" role="tab" aria-controls="qrcode"
          aria-selected="false"
          class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">QR-Code</button>
      </li>
    </ul>


    <div id="defaultTabContent">
      <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="detail" role="tabpanel"
        aria-labelledby="detail-tab">
        <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">{{ $user->nama_lengkap }}
        </h2>
        <ul role="list" class="space-y-2 text-gray-500 dark:text-gray-400">
          <li class="flex space-x-2 rtl:space-x-reverse items-center">
            <i class="fa-solid fa-universal-access"></i>
            <span class="leading-tight font-bold">Kode User / Access Token : </span><span> {{ $user->kode_user }}</span>
          </li>
          <li class="flex space-x-2 rtl:space-x-reverse items-center">
            <i class="fa-solid fa-hashtag"></i>
            <span class="leading-tight font-bold">NIP : </span><span> {{ $user->nip }}</span>
          </li>
          <li class="flex space-x-2 rtl:space-x-reverse items-center">
            <i class="fa-solid fa-envelope"></i>
            <span class="leading-tight font-bold">Email : </span><span> {{ $user->email }}</span>
          </li>
          <li class="flex space-x-2 rtl:space-x-reverse items-center">
            <i class="fa-solid fa-phone"></i>
            <span class="leading-tight font-bold">Nomor HP : </span><span>{{ $user->nomor_hp }}</span>
          </li>
          <li class="flex space-x-2 rtl:space-x-reverse items-center">
            <i class="fa-solid fa-user-tie"></i>
            <span class="leading-tight font-bold">Jabatan : </span><span>{{ $user->jabatan->jabatan }}</span>
          </li>
          <li class="flex space-x-2 rtl:space-x-reverse items-center">
            <i class="fa-solid fa-user-shield"></i>
            <span class="leading-tight font-bold">Role / Hak Akses : </span>
            <span
              class="{{ $user->role == 'superadmin' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : ($user->role == 'admin' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300') }} text-sm font-medium me-2 px-2.5 py-0.5 rounded">
              {{ $user->role == 'superadmin' ? 'Superadmin' : ($user->role == 'admin' ? 'Admin' : 'User') }}
            </span>
          </li>

        </ul>
      </div>


      <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="gambar" role="tabpanel"
        aria-labelledby="gambar-tab">
        <figure class="flex flex-col items-center justify-center max-w-lg mx-auto">
          <img class="h-auto w-64 rounded-lg shadow-md" src="{{ asset('storage/uploads/foto_user/' . $user->foto) }}"
            alt="image description">
        </figure>
      </div>

      <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="qrcode" role="tabpanel"
        aria-labelledby="qrcode-tab">
        <figure class="flex flex-col items-center justify-center max-w-lg mx-auto">
          <img class="h-auto max-w-full rounded-lg shadow-md"
            src="{{ asset('storage/uploads/qr_codes_user/' . $user->qr_code) }}" alt="image description">
        </figure>
      </div>

    </div>
  </div>
@endsection
