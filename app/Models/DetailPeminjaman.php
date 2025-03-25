<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetailPeminjaman extends Model
{
	use HasFactory;

	protected $table = 'detail_peminjaman';
	protected $with = ['barang'];
	protected $fillable = [
		'uuid',
		'kode_detail_peminjaman',
		'kode_peminjaman',
		'kode_barang',
	];

	public function barang(): BelongsTo
	{
		return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
	}
}
