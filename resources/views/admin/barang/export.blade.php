<table>
  <thead style="background-color: #f2f2f2; color: #000; font-weight: bold;">
    <tr>
      <th>uuid</th>
      <th>kode_barang</th>
      <th>nomor_seri</th>
      <th>merk</th>
      <th>jenis_barang_id</th>
      <th>status</th>
      <th>deskripsi</th>
      <th>qr_code</th>
      <th>limit</th>
      <th>sisa_limit</th>
      <th>foto</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($barang as $row)
      <tr style="color: #000;">
        <td>{{ $row->uuid }}</td>
        <td>{{ $row->kode_barang }}</td>
        <td>{{ $row->nomor_seri }}</td>
        <td>{{ $row->merk }}</td>
        <td>{{ $row->jenis_barang_id }}</td>
        <td>{{ $row->status }}</td>
        <td>{{ $row->deskripsi }}</td>
        <td>{{ $row->qr_code }}</td>
        <td>{{ $row->limit }}</td>
        <td>{{ $row->sisa_limit }}</td>
        <td>{{ $row->foto }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
