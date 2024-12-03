@extends('layouts.admin.main')
@section('content')
  <div class="ml-3 mr-3 p-3">
    <a href="{{ route('peminjaman.index') }}"
      class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</a>

    <div class="container mx-auto py-8">
      <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h3 class="text-lg font-bold text-black">Data Peminjaman</h3>
        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <p class="text-black"><span class="font-medium">Kode Peminjaman:</span> {{ $peminjaman->kode_peminjaman }}</p>
            <p class="text-black"><span class="font-medium">Nomor Surat:</span> {{ $peminjaman->nomor_surat }}</p>
            <p class="text-black"><span class="font-medium">Peminjam:</span> {{ $peminjaman->peminjam }}</p>
            <p class="text-black"><span class="font-medium">Status:</span>
              <span
                class="{{ $peminjaman->status === 'Proses' ? 'text-yellow-500 font-bold' : 'text-green-500 font-bold' }}">
                {{ $peminjaman->status }}
              </span>
            </p>
          </div>

          <div>
            <p class="text-black"><span class="font-medium">Peruntukan:</span> {{ $peminjaman->peruntukan->peruntukan }}
            </p>
            <p class="text-black"><span class="font-medium">Tanggal Penggunaan:</span>
              {{ date('d F Y', strtotime($peminjaman->tanggal_penggunaan)) }}</p>
            <p class="text-black"><span class="font-medium">Tanggal Peminjaman:</span>
              {{ date('d F Y', strtotime($peminjaman->tanggal_peminjaman)) }}</p>
            <p class="text-black"><span class="font-medium">Tanggal Kembali:</span>
              {{ date('d F Y', strtotime($peminjaman->tanggal_kembali)) }}
            </p>
          </div>
        </div>
      </div>


      <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-lg font-bold text-black mb-4">Barang yang Dipinjam</h3>
        <div class="relative overflow-x-auto">
          <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-black uppercase bg-gray-100">
              <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Kode Barang</th>
                <th scope="col" class="px-6 py-3">Nama Barang</th>
                <th scope="col" class="px-6 py-3">Nomor Seri</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($peminjaman->detailPeminjaman as $key => $detail)
                <tr class="bg-white border-b">
                  <td class="px-6 py-4 font-medium text-gray-900">{{ $key + 1 }}</td>
                  <td class="px-6 py-4 text-black">{{ $detail->kode_barang }}</td>
                  <td class="px-6 py-4 text-black">
                    {{ $detail->barang->nama_barang ?? 'Tidak Diketahui' }}
                  </td>
                  <td class="px-6 py-4 text-black">
                    {{ $detail->barang->nomor_seri ?? 'Tidak Diketahui' }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
