@php
  use App\Models\JenisBarang;
  $jenis_barang = JenisBarang::select('id', 'jenis_barang')->get();
@endphp

<form class="flex items-center w-60 justify-center" action="{{ route('barang.jenis-barang') }}" method="GET">
  <div class="w-full relative flex">
    <select id="jenis_barang" name="jenis_barang_id"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <option value="" {{ request('jenis_barang_id') == '' ? 'selected' : '' }}>-- Pilih Jenis Barang --</option>
      @foreach ($jenis_barang as $j)
        <option value="{{ $j->id }}" {{ request('jenis_barang_id') == $j->id ? 'selected' : '' }}>
          {{ $j->jenis_barang }}</option>
      @endforeach
    </select>
    <button
      class="text-white bg-tvri_base_color hover:bg-tvri_base_color focus:outline-none focus:ring-tvri_base_color font-medium rounded-r-lg text-sm px-3 py-2"
      type="submit">Cari</button>
  </div>
</form>
