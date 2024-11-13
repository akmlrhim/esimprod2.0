@extends('layouts.admin.main')

@section('content')
  <div class="m-1.5 overflow-x-auto ml-5 mr-3">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="border rounded-lg shadow overflow-hidden dark:border-neutral-700">
        <div class="container mx-auto p-4">
          <form action="{{ route('users.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sw-full">
                <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                  Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  placeholder="Masukkan nama lengkap" value="{{ old('nama_lengkap') }}" />
                @error('nama_lengkap')
                  <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                @enderror
              </div>


              <div class="w-full">
                <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                <input type="number" name="nip" id="nip"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  autocomplete="off" placeholder="Masukkan NIP" value="{{ old('nip') }}">
                @error('nip')
                  <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                @enderror
              </div>


              <div class="w-full">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" id="email"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  autocomplete="off" placeholder="Contoh. user@gmail.com" value="{{ old('email') }}">
                @error('email')
                  <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                @enderror
              </div>

              <div class="w-full">
                <label for="password"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" name="password" id="password"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  autocomplete="off" placeholder="Masukkan password" value="{{ old('password') }}">
                @error('password')
                  <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                @enderror
              </div>



              <div>
                <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                <select id="jabatan" name="jabatan"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  <option value="" {{ old('jabatan') == '' ? 'selected' : '' }}>--- Pilih Jabatan ---</option>
                  <option value="Technical Director" {{ old('jabatan') == 'Technical Director' ? 'selected' : '' }}>
                    Technical Director</option>
                  <option value="Cameramen" {{ old('jabatan') == 'Cameramen' ? 'selected' : '' }}>Cameramen</option>
                  <option value="Mahasiswa PKL" {{ old('jabatan') == 'Mahasiswa PKL' ? 'selected' : '' }}>Mahasiswa PKL
                  </option>
                  <option value="Editor" {{ old('jabatan') == 'Editor' ? 'selected' : '' }}>Editor</option>
                </select>
                @error('jabatan')
                  <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                @enderror
              </div>

              <div>
                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                <select id="role" name="role"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  <option value="" {{ old('role') == '' ? 'selected' : '' }}>--- Pilih Role ---</option>
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
