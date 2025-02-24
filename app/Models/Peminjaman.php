<?php

namespace App\Models;

use App\Models\Peruntukan;
use App\Models\DetailPeminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
	use HasFactory;
	protected $table = 'peminjaman';
	protected $with = 'peruntukan';

	protected $fillable = [
		'uuid',
		'kode_peminjaman',
		'nomor_peminjaman',
		'peruntukan_id',
		'nomor_surat',
		'tanggal_penggunaan',
		'tanggal_peminjaman',
		'tanggal_kembali',
		'peminjam',
		'qr_code',
		'status'
	];

	public function peruntukan(): BelongsTo
	{
		return $this->belongsTo(Peruntukan::class, 'peruntukan_id', 'id');
	}

	public function pengembalian(): HasMany
	{
		return $this->hasMany(Pengembalian::class, 'kode_peminjaman', 'kode_peminjaman');
	}

	public function detailPeminjaman(): HasMany
	{
		return $this->hasMany(DetailPeminjaman::class, 'kode_peminjaman', 'kode_peminjaman');
	}
}
