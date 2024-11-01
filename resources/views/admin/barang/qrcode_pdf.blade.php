<!DOCTYPE html>
<html>

<head>
  <title>QR Code Barang</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
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

    .center-text p {
      margin: 4px 0;
    }

    .center-text img {
      margin-bottom: 5px;
    }

    td {
      padding: 8px;
      text-align: left;
      font-size: 10pt;
    }

    tr {
      border: 1px solid black;
    }

    .center-text {
      text-align: center;
    }

    .center-text p {
      margin: 4px 0;
    }

    .center-text img {
      margin-bottom: 5px;
    }
  </style>
</head>

<body>
  <center>
    <h5>QR Code Barang</h5>
  </center>

  <table>
    <tbody>
      @foreach ($barang as $b)
        <tr>
          <td class="center-text">
            <img src="{{ public_path('storage/uploads/qr_codes/' . $b->qr_code) }}" width="45px">
          <td class="center-text"> {{ $b->nama_barang }}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>
