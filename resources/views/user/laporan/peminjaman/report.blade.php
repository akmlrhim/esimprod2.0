<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
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
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;">
                <div style="font-weight: bold; font-size: 30px;">Daftar Barang Pinjam</div>
                <div style="font-size: 20px;">Nomor Peminjaman: 3526830510190</div>
                <div>Tanggal Pinjam: 2021</div>
            </td>
            <td style="width: 50%; text-align: right;">
                <img src="{{ public_path('img/assets/esimprod_logo.png') }}" alt="Esimprod" width="100"/>
                <div>Version 2.0</div>
            </td>
        </tr>
    </table>


    <div class="margin-top">
        <table class="w-full">
            <tr>
                <td class="w-half">
                    <div>Peminjam : {{ $peminjaman->peminjaman }}</div>
                    <div>NIP : 123456</div>
                    <div>No. HP : 08123456789</div>
                    <div>Jabatan : Technical Director</div>
                </td>
                <td class="w-half">
                    <div>Surat Tugas : {{ $peminjaman->nomor_surat }}</div>
                    <div>Peruntukan : {{ $peminjaman->peruntukan->peruntukan }}</div>
                    <div>Tgl. Penggunaan : {{ $peminjaman->tanggal_peminjaman }}</div>
                    <div>Sampai : {{ $peminjaman->tanggal_kembali  }}</div>
                </td>
                <td class="w-half">
                    <div>QR Pengembalian : <img src="{{ public_path('storage/uploads/qr_codes/1730858608_qr.png') }}""
                        alt="" width="50px">
                    </div>
                    <div>Kode : {{ $peminjaman->kode_peminjaman }}</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="margin-top">
        <table class="products" style="width: 100%;">
            <tr>
                <th style="text-align: left;">NO</th>
                <th style="text-align: left;">Nama Barang</th>
                <th style="text-align: left;">Merk</th>
                <th style="text-align: left;">No. Seri</th>
                <th style="text-align: left;">Checklist</th>
            </tr>
            @foreach($barang as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['nama_barang'] }}</td>
                    <td>{{ $item['merk'] }}</td>
                    <td>{{ $item['nomor_seri'] }}</td>
                    <td></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
</body>

</html>
