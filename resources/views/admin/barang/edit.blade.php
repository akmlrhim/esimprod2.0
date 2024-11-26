@extends('layouts.admin.main')
@section('content')
  <div class="-m-1.5 overflow-x-auto ml-5 mr-3">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="border rounded-lg shadow overflow-hidden dark:border-neutral-700">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
          <div class="container mx-auto p-4">
            <form action="{{ route('barang.update', $barang->uuid) }}" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-4">
                {{-- sebelah kiri --}}
                <div class="flex flex-col space-y-4">
                  <div>
                    <label class="block text-sm font-bold text-black">Nama Barang</label>
                    <input type="text" name="nama_barang" autocomplete="off"
                      class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                      value="{{ old('nama_barang', $barang->nama_barang) }}" />
                    @error('nama_barang')
                      <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                    @enderror
                  </div>

                  <div>
                    <label class="block text-sm font-bold text-black">Jenis Barang</label>
                    <select name="jenis_barang_id"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option value="" disabled>Select jenis barang</option>
                      @foreach ($jenis_barang as $j)
                        <option value="{{ $j->id }}"
                          {{ old('jenis_barang_id', $barang->jenis_barang_id) == $j->id ? 'selected' : '' }}>
                          {{ $j->jenis_barang }}
                        </option>
                      @endforeach
                    </select>
                    @error('jenis_barang_id')
                      <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                    @enderror
                  </div>

                  <div class="flex w-full space-x-4">
                    <div class="w-1/2">
                      <label class="block text-sm font-bold text-black">Limit</label>
                      <input type="number" name="limit" min="0" autocomplete="off"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ old('limit', $barang->limit) }}" />
                      @error('limit')
                        <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                      @enderror
                    </div>
                    <div class="w-1/2">
                      <label class="block text-sm font-bold text-black">Sisa Limit</label>
                      <input type="number" name="sisa_limit" min="0" autocomplete="off"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ old('sisa_limit', $barang->sisa_limit) }}" />
                      @error('sisa_limit')
                        <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                      @enderror
                    </div>
                  </div>

                  <div>
                    <label class="block text-sm font-bold text-black">Nomor Seri</label>
                    <input type="text" name="nomor_seri" autocomplete="off"
                      class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                      value="{{ old('nomor_seri', $barang->nomor_seri) }}" />
                    @error('nomor_seri')
                      <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                    @enderror
                  </div>

                  <div>
                    <label class="block text-sm font-bold text-black">Merk</label>
                    <input type="text" name="merk" autocomplete="off"
                      class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                      value="{{ old('merk', $barang->merk) }}" />
                    @error('merk')
                      <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                    @enderror
                  </div>
                </div>

                {{-- sebelah kanan  --}}
                <div class="flex flex-col space-y-4">
                  <div>
                    <label class="block text-sm font-bold text-black">Upload Foto Barang</label>
                    <div class="mb-2">
                      <img id="photoPreview"
                        src="{{ $barang->foto ? asset('storage/uploads/foto_barang/' . $barang->foto) : 'https://via.placeholder.com/150' }}"
                        alt="Photo Preview" class="w-28 h-28 object-cover rounded-lg shadow-md">
                    </div>
                    <input
                      class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                      type="file" name="foto" id="foto" accept="image/*">
                    @error('foto')
                      <small class="text-red-500 text-sm mt-1"> {{ $message }}</small>
                    @enderror
                  </div>

                  <div>
                    <label class="block text-sm font-bold text-black">Deskripsi</label>
                    <textarea id="message" rows="3"
                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="Tambahkan deskripsi...." name="deskripsi">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
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
        </table>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    document.getElementById('foto').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById('photoPreview').src = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    });
  </script>
@endsection
