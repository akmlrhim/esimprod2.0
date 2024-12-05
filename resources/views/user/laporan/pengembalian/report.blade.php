<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laporan Pengembalian</title>
</head>

<style>
  * {
    font-family: "Times New Roman", sans-serif;
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

  table.back tr {
    background-color: orange;
  }

  table.back {
    font-size: 14px
  }

  table.back th {
    color: #ffffff;
    padding: 0.5rem
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

  .content-border {
    border: 1px solid #000;
    padding: 1rem;
    height: 100vh;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
</style>

<body>
  <div class="content-border">
    {{-- bagian atas dekat header surat --}}
    <table style="width: 100%;">
      <tr>
        <td style="width: 33%;">
          <div style="font-weight: bold; font-size: 20px;">Laporan Pengembalian Barang</div>
          <div>Nomor Peminjaman: 3526830510190</div>
          <div>Kode Pengembalian: 2021</div>
        </td>
        <td style="width: 33%;">
          <br>
          <div>Waktu Peminjaman: 3526830510190</div>
          <div>Waktu pengembalian: 2021</div>
        </td>
        <td style="width: 33%; text-align: right;">
          <img src="{{ public_path('img/assets/esimprod_logo.png') }}" alt="Esimprod" width="100" />
          <div>Version 2.0</div>
        </td>
      </tr>
    </table>
    {{-- endd --}}


    {{-- data peminjaman --}}
    <div class="margin-top">
      <table class="w-full">
        <tr>
          <td class="w-half">
            <div>Peminjam : John Doe</div>
            <div>NIP : 123456</div>
            <div>No. HP : 08123456789</div>
            <div>Jabatan : Technical Director</div>
          </td>
          <td class="w-half">
            <div>Surat Tugas : AGCSVD/123/45/1019</div>
            <div>Peruntukan : PT. ABC</div>
            <div>Tgl. Penggunaan : 2023-01-01</div>
            <div>Sampai : 2023-01-01</div>
          </td>
          <td class="w-half">
            <div>QR Pengembalian : <img src="{{ public_path('storage/uploads/qr_codes/1730858608_qr.png') }}"
                alt="" width="50px"></div>
            <div>Kode : PMB014</div>
          </td>
        </tr>
      </table>
    </div>
    {{-- end data peminjaman --}}



    {{-- tabel barang kondisi kembali  --}}
    <div class="margin-top">
      <table class="products" style="width: 100%; border-collapse: collapse;">
        <table class="products" style="width: 100%; border-collapse: collapse;" border="1">
          <tr>
            <th style="text-align: left;">NO</th>
            <th style="text-align: left;">Nama Barang</th>
            <th style="text-align: left;">Merk</th>
            <th style="text-align: left;">No. Seri</th>
            <th style="text-align: left;">Kondisi</th>
          </tr>
          <tr class="items">
            <td style="text-align: left;">Data 1</td>
            <td style="text-align: left;">Data 2</td>
            <td style="text-align: left;">Data 3</td>
            <td style="text-align: left;">Data 3</td>
            <td style="text-align: left;">Data 3</td>
          </tr>
          <tr class="items">
            <td style="text-align: left;">Data 1</td>
            <td style="text-align: left;">Data 2</td>
            <td style="text-align: left;">Data 3</td>
            <td style="text-align: left;">Data 3</td>
            <td style="text-align: left;">Data 3</td>
          </tr>
          <tr class="items">
            <td style="text-align: left;">Data 1</td>
            <td style="text-align: left;">Data 2</td>
            <td style="text-align: left;">Data 3</td>
            <td style="text-align: left;">Data 3</td>
            <td style="text-align: left;">Data 3</td>
          </tr>
        </table>
    </div>
    {{-- end tabel barang kondisi kembali --}}


    {{-- tabel barang tidak kembali --}}
    <div class="margin-top">
      <p>Barang Belum dikembalikan:</p>
      <table class="back" style="width: 100%; border-collapse: collapse;">
        <table class="bacl" style="width: 100%; border-collapse: collapse;" border="1">
          <tr>
            <th style="text-align: left;">NO</th>
            <th style="text-align: left;">Nama Barang</th>
            <th style="text-align: left;">Merk</th>
            <th style="text-align: left;">No. Seri</th>
            <th style="text-align: left;">Penjelasan</th>
          </tr>
          <tr class="items">
            <td style="text-align: left;">Data 1</td>
            <td style="text-align: left;">Data 2</td>
            <td style="text-align: left;">Data 3</td>
            <td style="text-align: left;">Data 3</td>
            <td style="text-align: left;">Data 3</td>
          </tr>
          <tr class="items">
            <td style="text-align: left;">Data 1</td>
            <td style="text-align: left;">Data 2</td>
            <td style="text-align: left;">Data 3</td>
            <td style="text-align: left;">Data 3</td>
            <td style="text-align: left;">Data 3</td>
          </tr>
          <tr class="items">
            <td style="text-align: left;">Data 1</td>
            <td style="text-align: left;">Data 2</td>
            <td style="text-align: left;">Data 3</td>
            <td style="text-align: left;">Data 3</td>
            <td style="text-align: left;">Data 3</td>
          </tr>
        </table>
    </div>
    {{-- end tabel barang tidak kembali --}}

  </div>
</body>

</html>
