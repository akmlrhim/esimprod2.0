<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\DetailPeminjaman;

class Barang extends Model
{
	use HasFactory;
	protected $table = 'barang';
	protected $with = ['jenisBarang'];

	protected $fillable = [
		'uuid',
		'kode_barang',
		'nama_barang',
		'jenis_barang_id',
		'status',
		'deskripsi',
		'nomor_seri',
		'merk',
		'qr_code',
		'limit',
		'sisa_limit',
		'foto',
	];

	public function jenisBarang(): BelongsTo
	{
		return $this->belongsTo(JenisBarang::class, 'jenis_barang_id');
	}

	public function peminjaman(): HasMany
	{
		return $this->hasMany(Peminjaman::class, 'kode_barang', 'kode_barang');
	}

	public function detail_peminjaman(): HasMany
	{
		return $this->hasMany(DetailPeminjaman::class, 'kode_barang', 'kode_barang');
	}

	public function detail_pengembalian(): HasMany
	{
		return $this->hasMany(DetailPengembalian::class, 'kode_barang', 'kode_barang');
	}
}
