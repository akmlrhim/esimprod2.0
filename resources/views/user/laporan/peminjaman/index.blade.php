@php use Carbon\Carbon; @endphp
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Daftar Barang Pinjam</title>
    <!-- QRCode.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 93%;
            margin: auto;
            padding: 10px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            /* Pushes h1 and logo to opposite ends */
            /* border-bottom: 2px solid #dd3333;
                  padding-bottom: 10px; */
        }

        h1 {
            margin: 0;
            /* font-size: 24px; */
        }

        /* Style for the logo */
        .logo {
            width: 100px;
            /* Adjust the width as needed */
            height: auto;
        }

        .info-section {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            margin-top: 20px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #3251ad;
            color: white;
        }

        .btn-group {
            margin-top: 20px;
            text-align: center;
        }

        .btn {
            background-color: #1e3164;
            border: none;
            color: white;
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn:hover {
            transition-duration: 0.5s;
            background-color: #3251ad;
        }
    </style>
</head>

<body>
<div class="container">
    <!-- Header section with h1 and logo aligned -->
    <div class="header">
        <h1>Daftar Barang Pinjam</h1>
        <img
            src="img/assets/esimprod_logo.png"
            alt="Logo"
            class="logo"
        >
    </div>

    <h3 style="font-weight: normal;"><strong>No Peminjaman:</strong> 2023-10-0007</h3>
    <p><strong>Waktu Peminjaman:</strong> 10 Oktober 2023, 19:23 WITA</p>

    <div class="info-section">
        <div class="item">
            <p><strong>Peminjam:</strong> {{ $peminjaman->peminjam }}</p>
            <p><strong>NIP:</strong> 199004232022031007</p>
            <p><strong>No HP:</strong> 085386612234</p>
            <p><strong>Jabatan:</strong> Teknisi Siaran</p>
        </div>
        <div class="item">
            <p><strong>Surat Tugas:</strong> {{ $peminjaman->nomor_surat }}</p>
            <p><strong>Peruntukan:</strong> {{ $peminjaman->peruntukan->peruntukan }}</p>
            <p><strong>Tgl
                    Penggunaan:</strong> {{ Carbon::parse($peminjaman->tanggal_peminjaman)->format('d F Y') }}
            </p>
            <p><strong>Sampai:</strong> {{ Carbon::parse($peminjaman->tanggal_kembali)->format('d F Y') }}</p>
        </div>
        <div class="item">
            <p><strong>Kode:</strong> {{ $peminjaman->kode_peminjaman }}</p>
            <p><strong>QR Pengembalian:</strong></p>
            <div id="qrcode"></div> <!-- Container untuk QR Code -->
        </div>
    </div>

    <table>
        <thead>
        <tr>
            <th>NO</th>
            <th>Nama Barang</th>
            <th>Merk</th>
            <th>No Seri</th>
            <th>Checklist</th>
        </tr>
        </thead>
        <tbody>
        @foreach($barang as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item['nama_barang'] }}</td>
                <td>{{ $item['merk'] }}</td>
                <td>{{ $item['nomor_seri'] }}</td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="btn-group">
        <a href="{{ route('user.peminjaman.pdf') }}" type="button" class="btn">Download PDF</a>
        {{--      <button class="btn">Cetak</button>--}}
        <a href="{{ route('options') }}" type="button" class="btn">Selesai</a>
    </div>
</div>
<!-- Pastikan QRCode.js sudah disertakan sebelum skrip ini -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil nilai kode_peminjaman dari Blade
        const kodePeminjaman = "{{ $peminjaman->kode_peminjaman }}";

        // Atur opsi QR Code (opsional)
        const qrOptions = {
            text: kodePeminjaman, // Teks atau URL yang akan dikodekan
            width: 128, // Lebar QR Code
            height: 128, // Tinggi QR Code
            colorDark: "#000000", // Warna gelap
            colorLight: "#ffffff", // Warna terang
            correctLevel: QRCode.CorrectLevel.H // Tingkat koreksi kesalahan
        };

        // Buat QR Code
        const qrCode = new QRCode(document.getElementById("qrcode"), qrOptions);

        // Jika Anda ingin mengkodekan URL, Anda bisa mengubah `text` menjadi URL pengembalian
        // Contoh:
        // const returnUrl = "{{ route('user.pengembalian.index', ['kode' => $peminjaman->kode_peminjaman]) }}";
        // qrCode.clear(); // Hapus QR Code sebelumnya jika ada
        // qrCode.makeCode(returnUrl);
    });
</script>
</body>

</html>
