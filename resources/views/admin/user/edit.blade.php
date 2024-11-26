@extends('layouts.admin.main')

@section('content')
  <div class="m-1.5 overflow-x-auto ml-5 mr-3">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="border rounded-lg shadow overflow-hidden dark:border-neutral-700">
        <div class="container mx-auto p-4">
          <form action="{{ route('users.update', $user->uuid) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sw-full">
                <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                  Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap"
                  value="{{ old('nama_lengkap', $user->nama_lengkap) }}"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  placeholder="Masukkan nama lengkap" />
                @error('nama_lengkap')
                  <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                @enderror
              </div>

              <div class="w-full">
                <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                <input type="text" name="nip" id="nip" value="{{ old('nip', $user->nip) }}"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  autocomplete="off" placeholder="Masukkan NIP">
                @error('nip')
                  <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                @enderror
              </div>


              <div class="w-full">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  autocomplete="off" placeholder="Contoh. user@gmail.com">
                @error('email')
                  <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                @enderror
              </div>

              <div class="w-full">
                <label for="nomor_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                  HP</label>
                <input type="nomor_hp" name="nomor_hp" id="nomor_hp" value="{{ old('nomor_hp', $user->nomor_hp) }}"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  autocomplete="off" placeholder="Contoh. 0813XXXXXX">
                @error('nomor_hp')
                  <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                @enderror
              </div>

              <div>
                <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                <select id="jabatan" name="jabatan_id"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  <option value="" disabled>Pilih jabatan</option>
                  @foreach ($jabatan as $j)
                    <option value="{{ $j->id }}"
                      {{ old('jabatan_id', $user->jabatan_id) == $j->id ? 'selected' : '' }}>
                      {{ $j->jabatan }}
                    </option>
                  @endforeach
                </select>
                @error('jabatan')
                  <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                @enderror
              </div>

              <div>
                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                <select id="role" name="role"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  <option value="{!! $user->role !!}" {{ old('role') == '' ? 'selected' : '' }}>
                    {!! $user->role !!}</option>
                  <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                  <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                  <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                </select>
                @error('role')
                  <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                @enderror
              </div>

              <div class="sm:col-span-2">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Foto Profil</label>
                <input
                  class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                  value="{{ old('foto') }}" type="file" name="foto" />
                @error('foto')
                  <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="mt-4">
              <a href="{{ route('users.index') }}"
                class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Kembali</a>
              <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan
                Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
