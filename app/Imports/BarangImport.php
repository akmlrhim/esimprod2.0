<?php

namespace App\Imports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangImport implements ToModel, WithHeadingRow
{
	/**
	 * @param array $row
	 *
	 * @return \Illuminate\Database\Eloquent\Model|null
	 */
	public function model(array $row)
	{
		return new Barang([
			'uuid' => $row['uuid'],
			'kode_barang' => $row['kode_barang'],
			'nomor_seri' => $row['nomor_seri'],
			'merk' => $row['merk'],
			'jenis_barang_id' => $row['jenis_barang_id'],
			'status' => $row['status'],
			'deskripsi' => $row['deskripsi'],
			'qr_code' => $row['qr_code'],
			'limit' => $row['limit'],
			'sisa_limit' => $row['sisa_limit'],
			'foto' => $row['foto'],
		]);
	}
}
