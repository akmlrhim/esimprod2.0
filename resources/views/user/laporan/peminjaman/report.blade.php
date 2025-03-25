<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laporan Peminjaman</title>
</head>

<style>
  * {
    font-family: "Calibri", sans-serif;
  }

  h4 {
    margin: 0;
  }

  .w-full {
    width: 100%;
  }

  .w-half {
    width: 50%;
  }

  .margin-top {
    margin-top: 1.25rem;
  }

  .footer {
    font-size: 0.875rem;
    padding: 1rem;
    background-color: rgb(241 245 249);
  }

  table {
    width: 100%;
    border-spacing: 0;
  }

  table.products {
    font-size: 14px;
  }

  table.products tr {
    background-color: rgb(96 165 250);
  }

  table.products th {
    color: #ffffff;
    padding: 0.5rem;
  }

  table tr.items {
    background-color: rgb(241 245 249);
  }

  table tr.items td {
    padding: 0.5rem;
  }

  .note-container {
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 16px;
    max-width: 600px;
    margin: 20px auto;
    background-color: #f9f9f9;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .note-title {
    font-size: 12px;
    font-weight: bold;
  }

  .note-content {
    font-size: 12px;
  }
</style>

<body>
  <div class="content-border">
    <table style="width: 100%;">
      <tr>
        <td style="width: 50%;">
          <div style="font-weight: bold; font-size: 30px;">Daftar Barang Pinjam</div>
          <div style="font-size: 20px;">Nomor Peminjaman: {{ $peminjaman->nomor_peminjaman }}</div>
          <div>Tanggal Pinjam: {{ \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->translatedFormat('d F Y') }}
          </div>
        </td>
        <td style="width: 50%; text-align: right;">
          <img src="{{ public_path('img/assets/esimprod_logo.png') }}" alt="Esimprod" width="100" />
          <div>Version 2.0</div>
        </td>
      </tr>
    </table>


    <div class="margin-top">
      <table class="w-full">
        <tr>
          <td class="w-half">
            <div>Peminjam : {{ $peminjaman->peminjam }}</div>
            <div>NIP : {{ Auth::user()->nip }}</div>
            <div>No. HP : {{ Auth::user()->nomor_hp }}</div>
            <div>Jabatan : {{ Auth::user()->jabatan->jabatan }}</div>
          </td>
          <td class="w-half">
            <div>Surat Tugas : {{ $peminjaman->nomor_surat }}</div>
            <div>Peruntukan : {{ $peminjaman->peruntukan->peruntukan }}</div>
            <div>Tgl. Penggunaan :
              {{ Carbon\Carbon::parse($peminjaman->tanggal_penggunaan)->translatedFormat('d F Y') }}</div>
            <div>Sampai : {{ Carbon\Carbon::parse($peminjaman->tanggal_kembali)->translatedFormat('d F Y') }}
            </div>
          </td>
          <td class="w-half">
            <div>QR Pengembalian : <img
                src="{{ public_path('storage/uploads/qr_codes_peminjaman/' . $peminjaman->qr_code) }}" alt=""
                width="50px">
            </div>
            <div>Kode : {{ $peminjaman->kode_peminjaman }}</div>
          </td>
        </tr>
      </table>
    </div>

    <div class="margin-top">
      <table class="products" style="width: 100%; border-collapse: collapse;" border="1">
        <tr>
          <th style="text-align: left;">NO</th>
          <th style="text-align: left;">Nama Barang</th>
          <th style="text-align: left;">Merk</th>
          <th style="text-align: left;">No. Seri</th>
          <th style="text-align: left;">Checklist</th>
        </tr>
        {{-- looping data  --}}
        @foreach ($barang as $index => $item)
          <tr class="items">
            <td style="text-align: left;">{{ $index + 1 }}</td>
            <td style="text-align: left;">{{ $item['nama_barang'] }}</td>
            <td style="text-align: left;">{{ $item['merk'] }}</td>
            <td style="text-align: left;">{{ $item['nomor_seri'] }}</td>
            <td style="text-align: left;"></td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>

  <div class="note-container">
    <div class="note-title">Catatan</div>
    <div class="note-content">
      @foreach ($catatan as $c)
        {!! $c->isi_catatan !!}
      @endforeach
    </div>
  </div>
</body>

</html>
