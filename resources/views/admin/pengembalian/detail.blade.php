@extends('layouts.admin.main')
@section('content')
  <div class="ml-3 mr-3 p-3">
    <a href="{{ route('pengembalian.index') }}"
      class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</a>

    <div class="container mx-auto py-8">
      <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h3 class="text-lg font-bold text-black">Data Peminjaman</h3>
        <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-6">
          <div>
            <p class="text-gray-700 mb-2">
              <span class="font-medium text-black">Kode Peminjaman:</span>
              {{ $pengembalian->peminjaman->kode_peminjaman }}
            </p>
            <p class="text-gray-700 mb-2">
              <span class="font-medium text-black">Nomor Peminjaman:</span>
              {{ $pengembalian->peminjaman->nomor_peminjaman }}
            </p>
            <p class="text-gray-700 mb-2">
              <span class="font-medium text-black">Nomor Surat:</span>
              {{ $pengembalian->peminjaman->nomor_surat }}
            </p>
            <p class="text-gray-700 mb-2">
              <span class="font-medium text-black">Peminjam:</span>
              {{ $pengembalian->peminjaman->peminjam }}
            </p>
          </div>

          <div>
            <p class="text-gray-700 mb-2">
              <span class="font-medium text-black">Peruntukan:</span>
              {{ $pengembalian->peminjaman->peruntukan->peruntukan }}
            </p>
            <p class="text-gray-700 mb-2">
              <span class="font-medium text-black">Tanggal Penggunaan:</span>
              {{ date('d F Y', strtotime($pengembalian->peminjaman->tanggal_penggunaan)) }}
            </p>
            <p class="text-gray-700 mb-2">
              <span class="font-medium text-black">Tanggal Peminjaman:</span>
              {{ date('d F Y', strtotime($pengembalian->peminjaman->tanggal_peminjaman)) }}
            </p>
            <p class="text-gray-700 mb-2">
              <span class="font-medium text-black">Tanggal Kembali:</span>
              {{ date('d F Y', strtotime($pengembalian->peminjaman->tanggal_kembali)) }}
            </p>
          </div>

          <div class="flex items-center justify-center">
            <img src="{{ asset('/storage/uploads/qr_codes_peminjaman/' . $pengembalian->peminjaman->qr_code) }}"
              alt="QR Code {{ $pengembalian->peminjaman->kode_peminjaman }}" class="h-20 w-20 shadow-md">
          </div>
        </div>
      </div>


      <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-lg font-bold text-black mb-4">Data Barang yang Dikembalikan</h3>
        <div class="relative overflow-x-auto">
          <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-black uppercase bg-gray-100">
              <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Kode Barang</th>
                <th scope="col" class="px-6 py-3">Nama Barang</th>
                <th scope="col" class="px-6 py-3">Nomor Seri</th>
                <th scope="col" class="px-6 py-3">Jenis Barang</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Deskripsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pengembalian->detailPengembalian as $key => $detail)
                <tr class="bg-white border-b">
                  <td class="px-6 py-4 font-medium text-gray-900">{{ $key + 1 }}</td>
                  <td class="px-6 py-4 text-gray-700">{{ $detail->kode_barang }}</td>
                  <td class="px-6 py-4 text-gray-700">
                    {{ $detail->barang->nama_barang }}
                  </td>
                  <td class="px-6 py-4 text-gray-700">
                    {{ $detail->barang->nomor_seri }}
                  </td>
                  <td class="px-6 py-4 text-gray-700">
                    {{ $detail->barang->jenisBarang->jenis_barang }}
                  </td>
                  <td class="px-6 py-4 text-gray-700">
                    @if ($detail->status == 'baik')
                      <span
                        class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Baik</span>
                    @elseif($detail->status == 'hilang')
                      <span
                        class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Hilang</span>
                    @elseif($detail->status == 'rusak')
                      <span
                        class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Rusak</span>
                    @elseif($detail->status == 'cacat')
                      <span
                        class="bg-red-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Cacat</span>
                    @else
                      T
                    @endif
                  </td>
                  <td class="px-6 py-4 text-gray-700">{{ $detail->deskripsi }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
