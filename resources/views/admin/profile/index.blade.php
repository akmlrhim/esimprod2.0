@extends('layouts.admin.main')

@section('content')
  <div class="flex flex-wrap lg:flex-nowrap p-3 ml-3 mr-3">
    <div class="w-full">

      {{-- profile info  --}}
      <div class="bg-white shadow-md border w-full dark:bg-gray-800 relative h-auto overflow-hidden rounded-lg p-6 mb-4">
        <h1 class="font-bold text-2xl">Data Pribadi</h1>
        <p class="text-sm font-light text-gray-400 mt-1">Pastikan informasi Anda tetap valid dengan memperbarui data secara
          berkala.</p>

        <div class="mt-4">

          <form
            method="POST"
            action="{{ route('profil.update-profil') }}"
            class="space-y-5"
            enctype="multipart/form-data"
          >
            @csrf
            @method('PATCH')

            <div class="mb-3">
              <label
                for="nama_lengkap"
                class="block text-sm font-bold text-gray-900 dark:text-white"
              >Nama Lengkap
              </label>
              <input
                type="text"
                id="nama_lengkap"
                name="nama_lengkap"
                value="{{ old('nama_lengkap', Auth::user()->nama_lengkap) }}"
                autocomplete="off"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full lg:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="John Doe"
              />
              @error('nama_lengkap')
                <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-3">
              <label
                for="email"
                class="block text-sm font-bold text-gray-900 dark:text-white"
              >Email
              </label>
              <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', Auth::user()->email) }}"
                autocomplete="off"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full lg:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="example@.com"
              />
              @error('email')
                <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-3">
              <label
                for="nip"
                class="block text-sm font-bold text-gray-900 dark:text-white"
              >NIP
              </label>
              <input
                type="text"
                id="nip"
                name="nip"
                inputmode="numeric"
                value="{{ old('nip', Auth::user()->nip) }}"
                autocomplete="off"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full lg:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="1992XXXXX"
              />
              @error('nip')
                <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-3">
              <label
                for="nomor_hp"
                class="block text-sm font-bold text-gray-900 dark:text-white"
              >Nomor HP
              </label>
              <input
                type="text"
                id="nomor_hp"
                name="nomor_hp"
                inputmode="numeric"
                value="{{ old('nomor_hp', Auth::user()->nomor_hp) }}"
                autocomplete="off"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full lg:w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="0813XXXXXX"
              />
              @error('nomor_hp')
                <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-3">
              <label
                for="foto"
                class="block text-sm font-bold text-gray-900 dark:text-white"
              >Upload Foto (opsional)
              </label>
              <input
                type="file"
                id="foto"
                name="foto"
                autocomplete="off"
                class="block w-full lg:w-1/2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="foto_profil"
                id="foto_profil"
                type="file"
              />
              @error('foto')
                <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
              @enderror

            </div>

            <div>
              <button
                type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              >
                Simpan
              </button>
            </div>
          </form>
        </div>
      </div>



      {{-- password  --}}
      <div class="bg-white shadow-md border w-full dark:bg-gray-800 relative h-auto overflow-hidden rounded-lg p-6 mb-4">
        <h1 class="font-bold text-2xl">Password</h1>
        <p class="text-sm font-light text-gray-400 mt-1">Pastikan akun Anda menggunakan kata sandi yang panjang dan acak
          untuk tetap aman.</p>

        <div class="mt-4">

          <form
            method="POST"
            action="{{ route('profil.update-password') }}"
            class="space-y-5"
          >
            @csrf
            @method('PATCH')

            <div class="mb-3">
              <label
                for="current_password"
                class="block text-sm font-bold text-gray-900 dark:text-white"
              >Password Saat Ini
              </label>
              <div class="relative w-full lg:w-1/2">
                <input
                  type="password"
                  id="current_password"
                  name="current_password"
                  value="{{ old('current_password') }}"
                  autocomplete="off"
                  class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 pr-10"
                  placeholder="Password saat ini"
                />
                <button
                  type="button"
                  onclick="togglePassword('current_password')"
                  class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500"
                >
                  <i
                    id="icon-current_password"
                    class="fas fa-eye"
                  ></i>
                </button>
              </div>
              @error('current_password')
                <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-3">
              <label
                for="new_password"
                class="block text-sm font-bold text-gray-900 dark:text-white"
              >Password Baru
              </label>
              <div class="relative w-full lg:w-1/2">
                <input
                  type="password"
                  id="new_password"
                  name="new_password"
                  value="{{ old('new_password') }}"
                  autocomplete="off"
                  class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 pr-10"
                  placeholder="Password Baru"
                />
                <button
                  type="button"
                  onclick="togglePassword('new_password')"
                  class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500"
                >
                  <i
                    id="icon-new_password"
                    class="fas fa-eye"
                  ></i>
                </button>
              </div>
              @error('new_password')
                <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-3">
              <label
                for="confirm_password"
                class="block text-sm font-bold text-gray-900 dark:text-white"
              >Konfirmasi Password Baru
              </label>
              <div class="relative w-full lg:w-1/2">
                <input
                  type="password"
                  id="confirm_password"
                  name="new_password_confirmation"
                  value="{{ old('new_password_confirmation') }}"
                  autocomplete="off"
                  class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 pr-10"
                  placeholder="Konfirmasi Password Baru"
                />
                <button
                  type="button"
                  onclick="togglePassword('confirm_password')"
                  class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500"
                >
                  <i
                    id="icon-confirm_password"
                    class="fas fa-eye"
                  ></i>
                </button>
              </div>
              @error('new_password_confirmation')
                <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
              @enderror
            </div>

            <div>
              <button
                type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              >
                Simpan
              </button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
@endsection

@section('scripts')
  <script>
    function togglePassword(fieldId) {
      const field = document.getElementById(fieldId);
      const icon = document.getElementById(`icon-${fieldId}`);
      if (field.type === "password") {
        field.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        field.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    }
  </script>
@endsection
