@extends('layouts.admin.main')

@section('content')
  <div class="-m-1.5 overflow-x-auto ml-5 mr-3">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="border rounded-lg shadow overflow-hidden dark:border-neutral-700">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
          <div class="container mx-auto p-4">
            <form action="">
              @csrf
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col space-y-4">
                  <div>
                    <label class="block text-sm font-bold text-black">Nama Barang</label>
                    <input type="text" name="nama_barang"
                      class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('nama_barang')
                      <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                    @enderror
                  </div>
                  <div>
                    <label class="block text-sm font-bold text-black">Jenis Barang</label>
                    <select name="jenis_barang_id"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option value="">-- Pilih Jenis Barang --</option>
                      @foreach ($jenis_barang as $j)
                        <option value="{{ $j->id }}">{{ $j->jenis_barang }}</option>
                      @endforeach
                    </select>
                    @error('jenis_barang_id')
                      <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                    @enderror
                  </div>
                  <div>
                    <label class="block text-sm font-bold text-black">Status</label>
                    <select id="countries" name="status"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option value="">-- Pilih Status --</option>
                    </select>
                    @error('status')
                      <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                    @enderror
                  </div>
                </div>
                <div class="flex flex-col space-y-4">
                  <div>
                    <label class="block text-sm font-bold text-black">Limit</label>
                    <input type="number" name="limit" min="1"
                      class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('limit')
                      <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                    @enderror
                  </div>

                  <div>
                    <label class="block text-sm font-bold text-black">Upload Foto Barang</label>
                    <input
                      class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                      type="file" name="foto">
                    @error('foto')
                      <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="mt-4">
                <label class="block text-sm font-bold text-black">Deskripsi</label>
                <textarea id="message" rows="4"
                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Tambahkan deskripsi...." name="deskripsi"></textarea>
              </div>

              <div class="mt-4">
                <a href="{{ route('barang.index') }}"
                  class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</a>
                <button type="submit"
                  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan
                  Data</button>
              </div>

            </form>
          </div>
        </table>
      </div>
    </div>
  </div>
@endsection
