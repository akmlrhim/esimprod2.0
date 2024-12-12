<!DOCTYPE html>
<html>

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <title>Laporan Barang</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    h5,
    h6 {
      margin: 0;
      padding: 0;
    }

    h5 {
      font-size: 16px;
    }

    h6 {
      font-size: 12px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
      font-size: 10pt;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    th,
    td {
      border: 1px solid #ddd;
    }

    .center-text {
      text-align: center;
    }
  </style>
</head>

<body>
  <center>
    <h5>Laporan Data Barang</h5>
  </center>

  <table>
    <thead>
      <tr>
        <th class="center-text">No</th>
        <th class="center-text">Kode QR</th>
        <th class="center-text">Kode Barang</th>
        <th class="center-text">Nama Barang</th>
        <th class="center-text">Jenis Barang</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1 @endphp
      @foreach ($barang as $b)
        <tr>
          <td class="center-text">{{ $i++ }}</td>
          <td class="center-text">
            <img src="{{ public_path('storage/uploads/qr_codes/' . $b->qr_code) }}" width="45px">
          </td>
          <td class="center-text">{{ $b->kode_barang }}</td>
          <td class="center-text">{{ $b->nama_barang }}</td>
          <td class="center-text">{{ $b->jenisBarang->jenis_barang }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>
