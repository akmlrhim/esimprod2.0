@extends('layouts.admin.main')
@section('content')
  <div class="ml-3 mr-3 p-3">
    <a href="{{ route('peminjaman.index') }}"
      class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</a>

    <div class="container mx-auto py-8">
      <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h3 class="text-lg font-bold text-black mb-4">Data Peminjaman</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-start">
          <div>
            <p class="text-gray-700 mb-2">
              <span class="font-bold text-black">Kode Peminjaman:</span>
              {{ $peminjaman->kode_peminjaman }}
            </p>
            <p class="text-gray-700 mb-2">
              <span class="font-bold text-black">Nomor Surat:</span>
              {{ $peminjaman->nomor_surat }}
            </p>
            <p class="text-gray-700 mb-2">
              <span class="font-bold text-black">Peminjam:</span>
              {{ $peminjaman->peminjam }}
            </p>
            <p class="text-gray-700 mb-2">
              <span class="font-bold text-black">Status:</span>
              @if ($peminjaman->status === 'Proses')
                <span
                  class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300"><i
                    class="fa-solid fa-spinner mr-2"></i>Proses</span>
              @else
                <span
                  class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300"><i
                    class="fa-solid fa-circle-check mr-2"></i>Selesai</span>
              @endif
            </p>
          </div>

          <div>
            <p class="text-gray-700 mb-2">
              <span class="font-bold text-black">Peruntukan:</span>
              {{ $peminjaman->peruntukan->peruntukan }}
            </p>
            <p class="text-gray-700 mb-2">
              <span class="font-bold text-black">Tanggal Penggunaan:</span>
              {{ date('d F Y', strtotime($peminjaman->tanggal_penggunaan)) }}
            </p>
            <p class="text-gray-700 mb-2">
              <span class="font-bold text-black">Tanggal Peminjaman:</span>
              {{ date('d F Y', strtotime($peminjaman->tanggal_peminjaman)) }}
            </p>
            <p class="text-gray-700 mb-2">
              <span class="font-bold text-black">Tanggal Kembali:</span>
              {{ date('d F Y', strtotime($peminjaman->tanggal_kembali)) }}
            </p>
          </div>

          <div class="flex flex-col items-center justify-center">
            <img src="{{ asset('/storage/uploads/qr_codes_peminjaman/' . $peminjaman->qr_code) }}"
              alt="QR Code {{ $peminjaman->kode_peminjaman }}" class="h-20 w-20 shadow-md mb-2">
            <p class="text-sm font-medium text-gray-700">QR Code</p>
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
                <th scope="col" class="px-6 py-3">Jenis Barang</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($peminjaman->detailPeminjaman as $key => $detail)
                <tr class="bg-white border-b">
                  <td class="px-6 py-4 font-medium text-gray-900">{{ $key + 1 }}</td>
                  <td class="px-6 py-4 text-gray-700">{{ $detail->kode_barang }}</td>
                  <td class="px-6 py-4 text-gray-700">
                    {{ $detail->barang->nama_barang ?? 'Tidak Diketahui' }}
                  </td>
                  <td class="px-6 py-4 text-gray-700">
                    {{ $detail->barang->nomor_seri ?? 'Tidak Diketahui' }}
                  </td>
                  <td class="px-6 py-4 text-gray-700">
                    {{ $detail->barang->jenisBarang->jenis_barang ?? 'Tidak Diketahui' }}
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
