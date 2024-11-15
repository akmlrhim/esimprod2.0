@extends('layouts.admin.main')

@section('content')
  <div class="m-1.5 overflow-x-auto ml-5 mr-3">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="border rounded-lg shadow overflow-hidden dark:border-neutral-700">
        <div class="container mx-auto p-4">
          <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="gap-4">
              <div class="flex flex-col space-y-6">

                {{-- Nama Barang dan Jenis Barang --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <label for="nama_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                      Barang</label>
                    <input type="text" id="nama_barang" name="nama_barang" autocomplete="off"
                      class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                      value="{{ old('nama_barang') }}" />
                    @error('nama_barang')
                      <small class="text-red-500 text-sm mt-1">{{ $message }}</small>
                    @enderror
                  </div>

                  <div>
                    <label for="jenis_barang_id"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Barang</label>
                    <select id="jenis_barang_id" name="jenis_barang_id"
                      class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option value="">-- Pilih Jenis Barang --</option>
                      @foreach ($jenis_barang as $j)
                        <option value="{{ $j->id }}" {{ old('jenis_barang_id') == $j->id ? 'selected' : '' }}>
                          {{ $j->jenis_barang }}
                        </option>
                      @endforeach
                    </select>
                    @error('jenis_barang_id')
                      <small class="text-red-500 text-sm mt-1">{{ $message }}</small>
                    @enderror
                  </div>
                </div>

                {{-- Nomor Seri dan Merk --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <label for="nomor_seri" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                      Seri</label>
                    <input type="text" id="nomor_seri" name="nomor_seri" autocomplete="off"
                      class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                      value="{{ old('nomor_seri') }}" />
                    @error('nomor_seri')
                      <small class="text-red-500 text-sm mt-1">{{ $message }}</small>
                    @enderror
                  </div>

                  <div>
                    <label for="merk"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Merk</label>
                    <input type="text" id="merk" name="merk" autocomplete="off"
                      class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                      value="{{ old('merk') }}" />
                    @error('merk')
                      <small class="text-red-500 text-sm mt-1">{{ $message }}</small>
                    @enderror
                  </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <label for="limit"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Limit</label>
                    <input type="number" id="limit" name="limit" min="1" autocomplete="off"
                      class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                      value="{{ old('limit') }}" />
                    @error('limit')
                      <small class="text-red-500 text-sm mt-1">{{ $message }}</small>
                    @enderror
                  </div>

                  <div>
                    <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Foto
                      Barang</label>
                    <input type="file" id="foto" name="foto"
                      class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />
                    @error('foto')
                      <small class="text-red-500 text-sm mt-1">{{ $message }}</small>
                    @enderror
                  </div>
                </div>


                <div>
                  <label for="deskripsi"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                  <textarea id="deskripsi" name="deskripsi" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Tambahkan deskripsi....">{{ old('deskripsi') }}</textarea>
                </div>
              </div>
            </div>



            <div class="mt-4">
              <a href="{{ route('barang.index') }}"
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
