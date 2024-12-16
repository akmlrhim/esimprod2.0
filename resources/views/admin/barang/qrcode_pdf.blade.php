<!DOCTYPE html>
<html lang="en">

<head>
  <title>Daftar Barang</title>
  <style>
    * {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      border: 1px solid black;
      text-align: center;
      padding: 5px;
    }

    img {
      display: block;
      margin: auto;
    }
  </style>
</head>

<body>
  <h1 style="text-align: center; font-size:23px;">Daftar Barang</h1>
  <table width="100%">
    <tr>
      <td width="50%" valign="top">
        <table border="1" width="100%" cellspacing="0" cellpadding="5">
          <thead>
            <tr>
              <th>QR Code</th>
              <th>Nama Barang</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($barang->slice(0, ceil($barang->count() / 2)) as $b)
              <tr>
                <td>
                  <img src="{{ public_path('storage/uploads/qr_codes_barang/' . $b->qr_code) }}" width="40px">
                </td>
                <td>{{ $b->nama_barang }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </td>

      <td width="50%" valign="top">
        <table border="1" width="100%" cellspacing="0" cellpadding="5">
          <thead>
            <tr>
              <th>QR Code</th>
              <th>Nama Barang</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($barang->slice(ceil($barang->count() / 2)) as $b)
              <tr>
                <td>
                  <img src="{{ public_path('storage/uploads/qr_codes_barang/' . $b->qr_code) }}" width="40px">
                </td>
                <td>{{ $b->nama_barang }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </td>
    </tr>
  </table>
</body>

</html>
