@extends('layouts.admin.main')
@section('content')
  <div class="-m-1.5 ml-5 mr-3 overflow-x-auto">
    <div class="inline-block min-w-full p-1.5 align-middle">
      <div class="overflow-hidden rounded-lg border shadow dark:border-neutral-700">
        <div class="container mx-auto p-4">
          <form
            action="{{ route('perawatan.store') }}"
            method="POST"
          >
            @csrf
            <div class="grid grid-cols-1 gap-4"> <!-- Mengubah menjadi 1 kolom penuh -->
              <div class="flex flex-col space-y-4">
                <div>
                  <label class="block text-sm font-bold text-black">Nama Barang</label>
                  <select
                    name="kode_barang"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                  >
                    <option value="">Pilih Barang</option>
                    @foreach ($barang as $b)
                      <option
                        value="{{ $b->kode_barang }}"
                        {{ old('kode_barang') == $b->kode_barang ? 'selected' : '' }}
                      >
                        {{ $b->kode_barang }} - {{ $b->nama_barang }}
                      </option>
                    @endforeach
                  </select>
                  @error('kode_barang')
                    <small class="mt-1 text-sm text-red-500"> {{ $message }}</small>
                  @enderror
                </div>

                <div>
                  <label class="block text-sm font-bold text-black">Jenis Perawatan</label>
                  <select
                    name="jenis_perawatan"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                  >
                    <option
                      value=""
                      {{ old('jenis_perawatan') == '' ? 'selected' : '' }}
                    >Pilih Jenis Perawatan
                    </option>
                    <option
                      value="maintenance"
                      {{ old('jenis_perawatan') == 'maintenance' ? 'selected' : '' }}
                    >Maintenance</option>
                    <option
                      value="servis-ringan"
                      {{ old('jenis_perawatan') == 'servis-ringan' ? 'selected' : '' }}
                    >Servis Ringan</option>
                  </select>

                  @error('jenis_perawatan')
                    <small class="mt-1 text-sm text-red-500"> {{ $message }}</small>
                  @enderror
                </div>

                <div>
                  <label class="block text-sm font-bold text-black">Keterangan</label>
                  <textarea
                    rows="4"
                    class="block w-full rounded-lg border border-gray-300 bg-white p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="Tambahkan keterangan (opsional)...."
                    name="keterangan"
                  ></textarea>
                </div>
              </div>
            </div>

            <div class="mt-4">
              <a
                href="{{ route('perawatan.index') }}"
                class="rounded-lg bg-gray-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800"
              >Kembali</a>
              <button
                type="submit"
                class="rounded-lg bg-blue-700 px-4 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              >Simpan Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
