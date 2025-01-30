<!DOCTYPE html>
<html lang="en">

<head>
  <title>Daftar Barang</title>
  <style>
    * {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12px;
    }

    body {
      margin: 20px;
    }

    h1 {
      text-align: center;
      font-size: 20px;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 10px;
    }

    th,
    td {
      border: 1px solid black;
      text-align: center;
      padding: 5px;
    }

    th {
      background-color: #f2f2f2;
    }

    img {
      display: block;
      margin: auto;
      max-width: 40px;
      max-height: 40px;
    }
  </style>
</head>

<body>
  <h1>Daftar Barang</h1>
  <table>
    <thead>
      <tr>
        <th>QR Code</th>
        <th>Nama Barang</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($barang as $b)
        <tr>
          <td>
            <img src="{{ public_path('storage/uploads/qr_codes_barang/' . $b->qr_code) }}" alt="QR Code">
          </td>
          <td>{{ $b->nama_barang }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>
